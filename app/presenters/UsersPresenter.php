<?php

namespace App\Presenters;

use Nette;
use Nette\Application\Responses\JsonResponse;
use Nette\InvalidArgumentException;

class UsersPresenter extends Nette\Application\UI\Presenter
{
    private $database;

    public function __construct(Nette\Database\Context $database)
    {
        $this->database = $database;
    }

    public function actionList($id)
    {
        if (!$id) {
            $users = array_map(
                function ($user) {
                    return $this->fetchRowToArray($user);
                },
                iterator_to_array($this->database->table('users'))
            );
            $this->sendResponse(new JsonResponse($users));
        } else {
            $user = $this->fetchRowToArray($this->database->table('users')->get($id));
            $this->sendResponse(new JsonResponse($user));
        }
    }

    public function actionCreate()
    {
        $newUser = json_decode($this->getHttpRequest()->getRawBody());
        $newUserId = $this->database->table('users')->insert([
            'email' => $newUser->email,
            'password' => $newUser->password,
            'first_name' => $newUser->first_name,
            'second_name' => $newUser->second_name,
            'age' => $newUser->age,
            'sex' => $newUser->sex,
        ])->getPrimary();
        $this->sendResponse(new JsonResponse(['id' => $newUserId]));
    }

    public function actionModify($id)
    {
        $user = $this->database->table('users')->get($id);
        if (!$id || !$user) {
            throw new InvalidArgumentException('Invalid Id');
        }
        $newUserData = json_decode($this->getHttpRequest()->getRawBody());
        $user->update([
            'email' => $newUserData->email,
            'password' => $newUserData->password,
            'first_name' => $newUserData->first_name,
            'second_name' => $newUserData->second_name,
            'age' => $newUserData->age,
            'sex' => $newUserData->sex,
        ]);
        $this->sendResponse(new JsonResponse(['msg' => 'ok']));
    }

    public function actionDelete($id)
    {
        $user = $this->database->table('users')->get($id);
        if (!$id || !$user) {
            throw new InvalidArgumentException('Invalid Id');
        }
        $user->delete();
        $this->sendResponse(new JsonResponse(['msg' => 'ok']));
    }

    private function fetchRowToArray($row)
    {
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
