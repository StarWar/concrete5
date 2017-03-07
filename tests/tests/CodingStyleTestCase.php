<?php
namespace Concrete\Tests;

abstract class CodingStyleTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string[]|null
     */
    private static $phpFiles = null;

    /**
     * @return string[]
     */
    protected static function getPhpFiles()
    {
        if (self::$phpFiles === null) {
            $files = [];
            $baseDir = rtrim(DIR_BASE_CORE, '/');
            $directoryIterator = new \RecursiveDirectoryIterator($baseDir);
            $iterator = new \RecursiveIteratorIterator($directoryIterator, \RecursiveIteratorIterator::LEAVES_ONLY);
            foreach ($iterator as $f) {
                /* @var \SplFileInfo $f */
                if (!$f->isFile()) {
                    continue;
                }
                $filename = $f->getFilename();
                if ($filename[0] === '.' || strcasecmp(substr($filename, -4), '.php') !== 0) {
                    continue;
                }
                $fullPath = str_replace(DIRECTORY_SEPARATOR, '/', $f->getRealPath());
                $relativePath = substr($fullPath, strlen($baseDir));
                if (strpos($relativePath, '/.') !== false) {
                    continue;
                }
                if (strpos($relativePath, '/vendor/') === 0) {
                    continue;
                }
                $files[] = $fullPath;
            }
            self::$phpFiles = $files;
        }

        return self::$phpFiles;
    }

    public function phpFilesProvider()
    {
        $result = [];
        foreach (static::getPhpFiles() as $f) {
            $result[] = [$f];
        }

        return $result;
    }
}
