<?php
declare(strict_types=1);

namespace App\Database;

class ImageActions
{
    private const UPLOADS_PATH = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'uploads';

    private const ALLOWED_MIME_TYPES_MAP = [
        'image/jpeg' => '.jpg',
        'image/png' => '.png',
        'image/gif' => '.gif',
    ];

    public function moveImageToUploads(array $fileInfo, int $userId): string
    {
        if (empty($fileInfo)) {
            return '';
        }
        $fileName = $fileInfo['name'];
        if (empty($fileName)) {
            return '';
        }
        $srcPath = $fileInfo['tmp_name'];
        if (empty($srcPath)) {
            return '';
        }
        $fileType = mime_content_type($srcPath);
        $imageExt = self::ALLOWED_MIME_TYPES_MAP[$fileType] ?? null;

        if (!$imageExt)
        {
            throw new \InvalidArgumentException("File '$fileName' has non-image type '$fileType'");
        }

        $destFileName = 'avatar' . $userId . $imageExt;
        $destPath = $this->getUploadPath($destFileName);

        if (!move_uploaded_file($srcPath, $destPath)) {
            throw new \RuntimeException("Failed to upload file $fileName");
        }

        return $destFileName;
    }

    public function getUploadPath(string $fileName): string
    {
        $uploadsPath = realpath(self::UPLOADS_PATH);
        if (!$uploadsPath || !is_dir($uploadsPath))
        {
            throw new \RuntimeException('Invalid uploads path: ' . self::UPLOADS_PATH);
        }

        return $uploadsPath . DIRECTORY_SEPARATOR . $fileName;
    }

    public static function getUploadUrlPath(string $fileName): string
    {
        return "/uploads/$fileName";
    }
}
