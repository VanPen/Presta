<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerLhoxu7g\appProdProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerLhoxu7g/appProdProjectContainer.php') {
    touch(__DIR__.'/ContainerLhoxu7g.legacy');

    return;
}

if (!\class_exists(appProdProjectContainer::class, false)) {
    \class_alias(\ContainerLhoxu7g\appProdProjectContainer::class, appProdProjectContainer::class, false);
}

return new \ContainerLhoxu7g\appProdProjectContainer([
    'container.build_hash' => 'Lhoxu7g',
    'container.build_id' => 'eed03ae0',
    'container.build_time' => 1571564189,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerLhoxu7g');
