<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude(__DIR__ . '/tests')
    ->in(__DIR__ . '/src');

$config = new PhpCsFixer\Config();
return $config
    ->setRules([
        // empty line between constants, data-types and traits
        // no leading import-backslash
        // https://cs.symfony.com/doc/rules/import/global_namespace_import.html
        '@Symfony' => true,
        'trailing_comma_in_multiline' => ['elements' => ['arrays', 'arguments', 'parameters']],
        'ordered_imports' => ['imports_order' => ['class', 'const', 'function'], 'sort_algorithm' => 'alpha'],
        // https://cs.symfony.com/doc/rules/operator/concat_space.html
        'concat_space' => ['spacing' => 'one'],
        // https://cs.symfony.com/doc/rules/operator/operator_linebreak.html
        'operator_linebreak' => ['only_booleans' => false, 'position' => 'beginning'],
        // https://cs.symfony.com/doc/rules/operator/ternary_to_null_coalescing.html
        'ternary_to_null_coalescing' => true,
        'binary_operator_spaces' => [
            'operators' => [
                // indentation for =>
                '=>' => 'align',
            ],
        ],
        // https://cs.symfony.com/doc/rules/class_notation/ordered_interfaces.html
        'ordered_interfaces' => ['direction' => 'ascend', 'order' => 'alpha'],
        // https://cs.symfony.com/doc/rules/control_structure/no_useless_else.html
        'no_useless_else' => true,
        'method_argument_space' => [
            'on_multiline' => 'ensure_fully_multiline',
            'keep_multiple_spaces_after_comma' => false,
        ],
        // https://cs.symfony.com/doc/rules/semicolon/multiline_whitespace_before_semicolons.html
        'multiline_whitespace_before_semicolons' => [
            'strategy' => 'no_multi_line',
        ],
        // https://cs.symfony.com/doc/rules/whitespace/no_extra_blank_lines.html
        'no_extra_blank_lines' => [
            'tokens' => [
                'break',
                'continue',
                'extra',
                'return',
                'throw',
                'use',
                'parenthesis_brace_block',
                'square_brace_block',
                'curly_brace_block',
            ],
        ],
        // https://cs.symfony.com/doc/rules/whitespace/method_chaining_indentation.html
        'method_chaining_indentation' => true,
        // https://cs.symfony.com/doc/rules/whitespace/blank_line_before_statement.html
        'blank_line_before_statement' => [
            'statements' => [
                'continue',
                'break',
                'throw',
                'try',
                'return',
                'do',
                'goto',
                'switch',
                'yield',
                'if',
                'while',
                'for',
                'foreach',
            ],
        ],
        // https://cs.symfony.com/doc/rules/whitespace/array_indentation.html
        'array_indentation' => true,
        'declare_strict_types' => true,
        'linebreak_after_opening_tag' => false,
        // https://cs.symfony.com/doc/rules/php_tag/blank_line_after_opening_tag.html -> <?php declare(strict_types=1); erlaubt
        'blank_line_after_opening_tag' => false,
        // https://cs.symfony.com/doc/rules/return_notation/return_assignment.html -> early return
        'return_assignment' => true,
        // no yodastyle
        'yoda_style' => ['equal' => false, 'identical' => false, 'less_and_greater' => false],
    ])
    ->setRiskyAllowed(true)
    ->setFinder($finder);
