<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'prestashop.core.grid.definition.factory.profile' shared service.

$this->services['prestashop.core.grid.definition.factory.profile'] = $instance = new \PrestaShop\PrestaShop\Core\Grid\Definition\Factory\ProfileGridDefinitionFactory(${($_ = isset($this->services['prestashop.core.hook.dispatcher']) ? $this->services['prestashop.core.hook.dispatcher'] : $this->getPrestashop_Core_Hook_DispatcherService()) && false ?: '_'}, ${($_ = isset($this->services['prestashop.router']) ? $this->services['prestashop.router'] : $this->load('getPrestashop_RouterService.php')) && false ?: '_'}->generate("admin_common_reset_search", ["controller" => "profile", "action" => "index"]), ${($_ = isset($this->services['prestashop.router']) ? $this->services['prestashop.router'] : $this->load('getPrestashop_RouterService.php')) && false ?: '_'}->generate("admin_profiles_index"), ${($_ = isset($this->services['prestashop.core.grid.action.row.accessibility_checker.delete_profile']) ? $this->services['prestashop.core.grid.action.row.accessibility_checker.delete_profile'] : $this->load('getPrestashop_Core_Grid_Action_Row_AccessibilityChecker_DeleteProfileService.php')) && false ?: '_'});

$instance->setTranslator(${($_ = isset($this->services['translator.default']) ? $this->services['translator.default'] : $this->getTranslator_DefaultService()) && false ?: '_'});

return $instance;