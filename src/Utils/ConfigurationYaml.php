<?php 
namespace OSW3\Sitemap\Utils;

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Filesystem\Path;
use Symfony\Component\Config\Definition\Processor;
use OSW3\Sitemap\DependencyInjection\Configuration;

class ConfigurationYaml
{
    public static function write(string $projectDir): void
    {
        $configFile = Path::join($projectDir, "config/packages", Configuration::NAME.".yaml");

        if (!file_exists($configFile))
        {
            $configuration = (new Processor)->processConfiguration(new Configuration(), []);

            file_put_contents($configFile, Yaml::dump([
                Configuration::NAME => $configuration
            ], 4));
        }
    }
}