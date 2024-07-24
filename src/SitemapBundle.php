<?php 
namespace OSW3\Sitemap;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use OSW3\Sitemap\DependencyInjection\Configuration;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class SitemapBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        (new Configuration)->generateProjectConfig($container->getParameter('kernel.project_dir'));
    }
}