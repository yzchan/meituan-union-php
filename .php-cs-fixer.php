<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$rules = [
    '@PHP71Migration' => true,
    '@PSR12'          => true,
    // 'strict_param' => true,
    // 'array_syntax' => ['syntax' => 'short'], // 将 array() 改成 [] 短写形式
    'ordered_imports' => [                      // Ordering use statements.
        'imports_order'  => ['const', 'class', 'function'],
        'sort_algorithm' => 'length',           // 可选值：alpha/length/none
    ],
    'concat_space' => [             // 连接字符是否需要空格
        'spacing' => 'one',
    ],
    'cast_spaces' => [              // A single space or none should be between cast and variable.
        'space' => 'none',          // 可选值：single/none
    ],
    'binary_operator_spaces' => [   // 二元运算符留空
        'default' => 'align_single_space',
    ],
    'class_attributes_separation' => [  // Class, trait 和 interface 的属性是否需要一个空行隔开
        'elements' => [
            'const'    => 'one',
            'method'   => 'one',
            'property' => 'one',
        ],
    ],
];

$finder = Finder::create()
    ->in([
        __DIR__ . '/src',
        __DIR__ . '/examples',
    ])
    ->name('*.php')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return (new Config())
    ->setFinder($finder)
    ->setRules($rules)
    ->setRiskyAllowed(true)
    ->setUsingCache(true);
