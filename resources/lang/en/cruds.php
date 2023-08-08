<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'artist' => [
        'title'          => 'Artists',
        'title_singular' => 'Artist',
        'fields'         => [
            'id'                         => 'ID',
            'id_helper'                  => ' ',
            'name'                       => 'Name',
            'name_helper'                => 'Artist Name',
            'phone'                      => 'Phone',
            'phone_helper'               => 'Phone',
            'pin'                        => 'Pin',
            'pin_helper'                 => ' ',
            'pin_reset'                  => 'Pin Reset',
            'pin_reset_helper'           => ' ',
            'created_at'                 => 'Created at',
            'created_at_helper'          => ' ',
            'updated_at'                 => 'Updated at',
            'updated_at_helper'          => ' ',
            'deleted_at'                 => 'Deleted at',
            'deleted_at_helper'          => ' ',
            'enabled'                    => 'Enabled',
            'enabled_helper'             => ' ',
            'six_month_royalties'        => 'Six Month Royalties',
            'six_month_royalties_helper' => ' ',
            'loan_limit'                 => 'Loan Limit',
            'loan_limit_helper'          => ' ',
        ],
    ],
    'loan' => [
        'title'          => 'Loans',
        'title_singular' => 'Loan',
        'fields'         => [
            'id'                              => 'ID',
            'id_helper'                       => ' ',
            'amount'                          => 'Loan Amount',
            'amount_helper'                   => ' ',
            'code'                            => 'Code',
            'code_helper'                     => ' ',
            'duration'                        => 'Duration',
            'duration_helper'                 => ' ',
            'processed'                       => 'Disbursed?',
            'processed_helper'                => ' ',
            'repaid'                          => 'Repaid',
            'repaid_helper'                   => ' ',
            'artist'                          => 'Artist',
            'artist_helper'                   => ' ',
            'created_at'                      => 'Created at',
            'created_at_helper'               => ' ',
            'updated_at'                      => 'Updated at',
            'updated_at_helper'               => ' ',
            'deleted_at'                      => 'Deleted at',
            'deleted_at_helper'               => ' ',
            'total_amount_to_repay'           => 'Amount To Be Repaid',
            'total_amount_to_repay_helper'    => ' ',
            'interest'                        => 'Total Interest',
            'interest_helper'                 => ' ',
            'monthly_repayment_amount'        => 'Monthly Repayment Amount',
            'monthly_repayment_amount_helper' => ' ',
            'admin_fee'                       => 'Admin Fees',
            'admin_fee_helper'                => ' ',
            'monthly_interest'                => 'Monthly Interest',
            'monthly_interest_helper'         => ' ',
            'admin_fee_percentage'            => 'Admin Fee Percentage',
            'admin_fee_percentage_helper'     => ' ',
        ],
    ],
    'payment' => [
        'title'          => 'Payments',
        'title_singular' => 'Payment',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'artist'             => 'Artist',
            'artist_helper'      => ' ',
            'amount'             => 'Amount',
            'amount_helper'      => ' ',
            'transaction'        => 'Transaction Code',
            'transaction_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'rate' => [
        'title'          => 'Loan Rates',
        'title_singular' => 'Loan Rate',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'interest_per_month'        => 'Interest Per Month %',
            'interest_per_month_helper' => ' ',
            'administrative_fee'        => 'Administrative Fee %',
            'administrative_fee_helper' => ' ',
            'is_active'                 => 'Is Active?',
            'is_active_helper'          => 'Activate',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
        ],
    ],

];