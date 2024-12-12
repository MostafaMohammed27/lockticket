<?php
define('PLUGIN_LOCKTICKET_VERSION', '1.0.0');

function plugin_init_lockticket() {
    global $PLUGIN_HOOKS;

    $PLUGIN_HOOKS['csrf_compliant']['lockticket'] = true;
    $PLUGIN_HOOKS['post_item_update']['lockticket'] = ['Ticket' => 'plugin_lockticket_prevent_steal'];
}

function plugin_version_lockticket() {
    return [
        'name'           => 'Lock Ticket',
        'version'        => PLUGIN_LOCKTICKET_VERSION,
        'author'         => 'Your Name',
        'license'        => 'GPLv3+',
        'homepage'       => 'https://example.com',
        'minGlpiVersion' => '10.0',
    ];
}

function plugin_lockticket_check_prerequisites() {
    if (version_compare(GLPI_VERSION, '10.0', '<')) {
        return false;
    }
    return true;
}

function plugin_lockticket_check_config() {
    return true;
}
?>

