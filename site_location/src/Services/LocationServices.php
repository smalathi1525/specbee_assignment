<?php

namespace Drupal\site_location\Services;

use Drupal\Core\Config\ConfigFactory;

/**
 * Class LocationService.
 *
 * @package Drupal\site_location\Services
 */
class LocationServices {
  /**
   * Configuration Factory.
   *
   * @var \Drupal\Core\Config\ConfigFactory
   */
  protected $configFactory;

  /**
   * Configuration Factory.
   */
  public function __construct(ConfigFactory $configFactory) {

    $this->configFactory = $configFactory;

  }

  /**
   * To get Site Location settings.
   */
  public function getSiteLocationSettings() {
    $config = $this->configFactory->get('site_location.settings');
    $custom = [];
    $custom['country'] = $config->get('site_country');
    $custom['city'] = $config->get('site_city');
    $custom['timezone'] = $timezone = $config->get('site_timezone');

    date_default_timezone_set($timezone);
    $custom['date'] = date();
    return $custom;
  }

}
