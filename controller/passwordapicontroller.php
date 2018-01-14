<?php

namespace OCA\Passwords\Controller;

use OCA\Passwords\Service\PasswordService;
use OCP\AppFramework\ApiController;
use OCP\AppFramework\Db\Entity;
use OCP\AppFramework\Http\DataResponse;
use OCP\IRequest;

class PasswordApiController extends ApiController {

    private $service;
    private $userId;

    use Errors;

    public function __construct($AppName, IRequest $request, PasswordService $service, $UserId) {
        // allow getting passwords and editing/saving them
        parent::__construct(
            $AppName,
            $request,
            'GET, POST, DELETE, PUT, PATCH',
            'Authorization, Content-Type, Accept',
            86400);
        $this->service = $service;
        $this->userId  = $UserId;
    }

    /**
     * @CORS
     * @NoCSRFRequired
     * @NoAdminRequired
     */
    public function index() {
        $arr = $this->service->findAll($this->userId, true);
        foreach($arr as $row => $value) {
            $arr[ $row ]['properties'] = $this->convertPropertiesForApi($arr[ $row ]['properties']);
        }

        return new DataResponse($arr);
    }

    /**
     * @CORS
     * @NoCSRFRequired
     * @NoAdminRequired
     *
     * @param int $id
     */
    public function show($id) {
        return $this->handleNotFound(function () use ($id) {
            $object               = $this->service->find($id, $this->userId);
            $object['properties'] = $this->convertPropertiesForApi($object['properties']);

            return $object;
        });
    }

    /**
     * @CORS
     * @NoCSRFRequired
     * @NoAdminRequired
     *
     * @param string $loginname
     * @param string $website
     */
    public function create($website, $pass, $loginname, $address, $notes, $category, $deleted) {
        $object = $this->service->create($website, $pass, $loginname, $address, $notes, $category, $deleted, $this->userId);

        return $this->convertPropertiesForApiObject($object);
    }

    /**
     * @CORS
     * @NoCSRFRequired
     * @NoAdminRequired
     *
     * @param int    $id
     * @param string $loginname
     * @param string $website
     */
    public function update($id, $website, $pass, $loginname, $address, $notes, $sharewith, $category, $deleted, $datechanged) {
        return $this->handleNotFound(function () use ($id, $website, $pass, $loginname, $address, $notes, $sharewith, $category, $deleted, $datechanged) {
            $object = $this->service->update($id, $website, $pass, $loginname, $address, $notes, $sharewith, $category, $deleted, $datechanged, $this->userId);

            return $this->convertPropertiesForApiObject($object);
        });
    }

    /**
     * @CORS
     * @NoCSRFRequired
     * @NoAdminRequired
     *
     * @param int $id
     */
    public function destroy($id) {
        return $this->handleNotFound(function () use ($id) {
            return $this->service->delete($id, $this->userId);
        });
    }

    /**
     * @param $properties
     *
     * @return string
     */
    protected function convertPropertiesForApiObject(Entity $object) {
        $object->setProperties(
            $this->convertPropertiesForApi($object->getProperties())
        );

        return $object;
    }

    /**
     * @param $properties
     *
     * @return string
     */
    protected function convertPropertiesForApi($properties) {
        $quot = '#Q#U#O#T#E#';

        if(empty($properties)) {
            return "null";
        }

        $properties = substr($properties, 1, strlen($properties) - 2);

        $properties = str_replace("\\", "\\\\", $properties);
        $properties = str_replace("\n", "\\n", $properties);
        $properties = str_replace("\t", "\\t", $properties);
        $properties = str_replace('", ,', '","', $properties);

        $properties = str_replace('", "', "$quot,$quot", $properties);
        $properties = str_replace('" : "', "$quot:$quot", $properties);
        $properties = str_replace('": "', "$quot:$quot", $properties);
        $properties = str_replace('"', '\"', $properties);
        $properties = str_replace($quot, '"', $properties);

        return '{"'.$properties.'"}';
    }

}
