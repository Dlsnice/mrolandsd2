<?php

// This goes into your functions.php and adds a link under "Tools" to export all pages with titles/urls/template name in CSV format

// Export all pages with titles, urls, and assigned template
add_action('admin_menu', function () {
    add_submenu_page(
        'tools.php',
        'Export Page Data',
        'Export Page Data',
        'manage_options',
        'export-page-data',
        'export_page_data_callback'
    );
});

function export_page_data_callback() {
    if (isset($_GET['download']) && $_GET['download'] === 'true') {
        // Prevent any other output
        if (ob_get_length()) ob_end_clean();
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=page-data.csv');

        $output = fopen('php://output', 'w');
        fputcsv($output, ['Title', 'URL', 'Template']);

        $pages = get_pages();
        foreach ($pages as $page) {
            $template = get_page_template_slug($page->ID) ?: 'default';
            fputcsv($output, [
                $page->post_title,
                get_permalink($page->ID),
                $template
            ]);
        }

        fclose($output);
        exit;
    }

    // Admin UI
    echo '<div class="wrap">';
    echo '<h1>Export Page Data</h1>';
    echo '<p><a class="button button-primary" href="' . esc_url(admin_url('tools.php?page=export-page-data&download=true')) . '">Download CSV</a></p>';
    echo '</div>';
}