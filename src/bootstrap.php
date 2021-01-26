<?php

require_once __DIR__.'/bootstrap.php';
require_once __DIR__.'/Xml/ErrorHandling/stop_on_first_issue.php';
require_once __DIR__.'/Xml/ErrorHandling/issue_level_from_xml_error.php';
require_once __DIR__.'/Xml/ErrorHandling/disallow_libxml_false_returns.php';
require_once __DIR__.'/Xml/ErrorHandling/issue_from_xml_error.php';
require_once __DIR__.'/Xml/ErrorHandling/detect_errors.php';
require_once __DIR__.'/Xml/ErrorHandling/issue_collection_from_xml_errors.php';
require_once __DIR__.'/Xml/ErrorHandling/disallow_issues.php';
require_once __DIR__.'/Xml/Dom/Outputter/xml_string_outputter.php';
require_once __DIR__.'/Xml/Dom/Locator/Xsd/locate_no_namespaced_xsd_schemas.php';
require_once __DIR__.'/Xml/Dom/Locator/Xsd/locate_namespaced_xsd_schemas.php';
require_once __DIR__.'/Xml/Dom/Locator/Xsd/locate_all_xsd_schemas.php';
require_once __DIR__.'/Xml/Dom/Validator/validator_chain.php';
require_once __DIR__.'/Xml/Dom/Validator/internal_xsd_validator.php';
require_once __DIR__.'/Xml/Dom/Validator/xsd_validator.php';
require_once __DIR__.'/Xml/Dom/Xpath/Locator/evaluate.php';
require_once __DIR__.'/Xml/Dom/Xpath/Locator/query.php';
require_once __DIR__.'/Xml/Dom/Xpath/Configurator/functions.php';
require_once __DIR__.'/Xml/Dom/Xpath/Configurator/all_functions.php';
require_once __DIR__.'/Xml/Dom/Xpath/Configurator/php_namespace.php';
require_once __DIR__.'/Xml/Dom/Xpath/Configurator/namespaces.php';
require_once __DIR__.'/Xml/Dom/Loader/load.php';
require_once __DIR__.'/Xml/Dom/Loader/xml_file_loader.php';
require_once __DIR__.'/Xml/Dom/Loader/xml_node_loader.php';
require_once __DIR__.'/Xml/Dom/Loader/xml_string_loader.php';
require_once __DIR__.'/Xml/Dom/Manipulator/Node/append_external_node.php';
require_once __DIR__.'/Xml/Dom/Manipulator/Node/import_node_deeply.php';
require_once __DIR__.'/Xml/Dom/Manipulator/Node/replace_by_external_node.php';
require_once __DIR__.'/Xml/Dom/Configurator/loader.php';
require_once __DIR__.'/Xml/Dom/Configurator/validator.php';
require_once __DIR__.'/Xml/Dom/Configurator/utf8.php';
require_once __DIR__.'/Xml/Dom/Configurator/trim_spaces.php';
require_once __DIR__.'/Xml/Dom/Builder/element.php';
require_once __DIR__.'/Xml/Dom/Builder/attribute.php';
require_once __DIR__.'/Xml/Dom/Builder/children.php';
require_once __DIR__.'/Xml/Dom/Builder/value.php';
require_once __DIR__.'/Xml/Dom/Builder/namespaced_element.php';
require_once __DIR__.'/Xml/Dom/Builder/namespaced_attribute.php';
