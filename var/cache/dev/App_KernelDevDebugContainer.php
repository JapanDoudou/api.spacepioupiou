<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerSoKCzXV\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerSoKCzXV/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerSoKCzXV.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerSoKCzXV\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerSoKCzXV\App_KernelDevDebugContainer([
    'container.build_hash' => 'SoKCzXV',
    'container.build_id' => '656bac9e',
    'container.build_time' => 1582936239,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerSoKCzXV');