<?php
declare(strict_types=1);

namespace App\Controller;

use App\Database\ConnectionProvider;
use App\Database\UserTable;
use App\Model\User;
use App\Database\ImageActions;

class UserController
{
    private const HTTP_STATUS_303_SEE_OTHER = 303;

    private UserTable $userTable;

    public function __construct()
    {
        $connection = ConnectionProvider::connectDatabase();
        $this->userTable = new UserTable($connection);
    }

    public function index(): void
    {
        require __DIR__ . '/../View/save_user_front.php';
    }

    public function uploadUser(array $requestData): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
        {
            $this->writeRedirectSeeOther('/');
            return;
        }

        $imageActions = new ImageActions();

        $user = new User(
            null,
            $requestData['first_name'],
            $requestData['last_name'],
            $requestData['middle_name'],
            $requestData['gender'],
            $requestData['birth_date'],
            $requestData['email'],
            $requestData['phone'],
            ''
        );
        $userId = $this->userTable->add($user);
        $userAvatar = $imageActions->moveImageToUploads($_FILES['avatar_path'], $userId);
        if (!empty($userAvatar))
        {
            $this->userTable->updateAvatarPath($userAvatar, $userId);
        }
        $this->writeRedirectSeeOther("/show_user.php?user_id=$userId");
    }

    public function showUser(array $queryParams): void
    {
        $userId = (int)$queryParams['user_id'];
        if (!$userId)
        {
            $this->writeRedirectSeeOther('/');
            exit();
        }
        $user = $this->userTable->find($userId);
        if (!$user)
        {
            $this->writeRedirectSeeOther('/');
            exit();
        }

        require_once __DIR__ . '/../View/show_user_front.php';
    }

    private function writeRedirectSeeOther(string $url): void
    {
        header('Location: ' . $url, false, self::HTTP_STATUS_303_SEE_OTHER);
    }
}