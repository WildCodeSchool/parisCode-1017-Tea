<?php

/**
 * Connect to online database
 *
 * @param [string] APP_DB_HOST
 * @param [string] APP_DB_USER
 * @param [string] APP_DB_PWD
 * @param [string] APP_DB_NAME
 * @param [string] APP_DB_PORT
 */
define("APP_DB_HOST", "wcs-tea.ckudyeeceg7d.eu-west-3.rds.amazonaws.com");
define("APP_DB_USER", "root");
define("APP_DB_PWD", "rootroot");
define("APP_DB_NAME", "wcs_tea");
define("APP_DB_PORT", "3306");

/**
 * Connect to Swiftmailer
 *
 * @param [string] APP_CONTACT_MAIL
 * @param [string] APP_CONTACT_PWD
 */
define("APP_CONTACT_MAIL", "contact.volupt@gmail.com");
define("APP_CONTACT_PWD", "jecode4wcs");

/**
 * Connect to Recaptcha
 *
 * @param [string] APP_CAPTCHA_SITEKEY
 * @param [string] APP_CAPTCHA_SECRET
 */
define("APP_CAPTCHA_SITEKEY", '6LeIIzsUAAAAAOUQ2F0nz-vWIJSGl7SwSSGglgRa');
define("APP_CAPTCHA_SECRET", '6LeIIzsUAAAAAPaLaQiBs9FnEgSOAa9ji7ihNhrL');