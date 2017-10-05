<?php

namespace App\Presenters;

use Nette;
use Nette\Application\Responses\JsonResponse;
use Nette\InvalidArgumentException;


class UsersPresenter extends Nette\Application\UI\Presenter
{
    private $database;

    public function __construct(Nette\Database\Context $database) {
        $this->database = $database;
    }

    public function actionList($id) {
        if(!$id) {
            $users = array_map(function($item) { return $this->fetchRowToArray($item);},
                iterator_to_array($this->database->table('users')));
            $this->sendResponse(new JsonResponse($users));
        } else {
            $user = $this->fetchRowToArray($this->database->table('users')->get($id));
            $this->sendResponse(new JsonResponse($user));
        }
    }

    public function actionCreate() {
        var_dump($this->request->getParameters());
    }

    public function actionEdit($id) {
        if(!$id) {
            throw new InvalidArgumentException('Invalid Id');
        }
    }

    public function actionDelete($id) {
        if(!$id) {
            throw new InvalidArgumentException('Invalid Id');
        }
    }

    private function fetchRowToArray($row) {
        return [
            'id' => $row->id,
            'email' => $row->email,
            'password' => $row->password,
            'first_name' => $row->first_name,
            'second_name' => $row->second_name,
            'age' => $row->age,
            'sex' => $row->sex,
        ];
    }
}
