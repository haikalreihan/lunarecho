<?php
function getDeviceName($userAgent) {
    $deviceName = "Unknown Device";

    // Deteksi beberapa perangkat umum
    if (preg_match('/HP Spectre/i', $userAgent)) {
        $deviceName = 'HP Spectre';
    } elseif (preg_match('/Dell XPS/i', $userAgent)) {
        $deviceName = 'Dell XPS';
    } elseif (preg_match('/MacBook/i', $userAgent)) {
        $deviceName = 'MacBook';
    } elseif (preg_match('/iPhone/i', $userAgent)) {
        $deviceName = 'iPhone';
    } elseif (preg_match('/iPad/i', $userAgent)) {
        $deviceName = 'iPad';
    } elseif (preg_match('/Samsung/i', $userAgent)) {
        $deviceName = 'Samsung Device';
    } elseif (preg_match('/OnePlus/i', $userAgent)) {
        $deviceName = 'OnePlus Device';
    } elseif (preg_match('/Pixel/i', $userAgent)) {
        $deviceName = 'Google Pixel';
    } elseif (preg_match('/Huawei/i', $userAgent)) {
        $deviceName = 'Huawei Device';
    } elseif (preg_match('/Xiaomi/i', $userAgent)) {
        $deviceName = 'Xiaomi Device';
    } elseif (preg_match('/ASUS/i', $userAgent)) {
        $deviceName = 'ASUS Device';
    } elseif (preg_match('/Lenovo/i', $userAgent)) {
        $deviceName = 'Lenovo Device';
    } elseif (preg_match('/Acer/i', $userAgent)) {
        $deviceName = 'Acer Device';
    }
    // Tambahkan deteksi perangkat lain sesuai kebutuhan

    return $deviceName;
}

// Fungsi untuk mendapatkan informasi perangkat
function getDeviceInfo() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $os = "Unknown OS";
    $browser = "Unknown Browser";
    $device_type = "Unknown Device";
    $device_name = getDeviceName($userAgent);
    
    if (preg_match('/linux/i', $userAgent)) {
        $os = 'Linux';
    } elseif (preg_match('/macintosh|mac os x/i', $userAgent)) {
        $os = 'Mac';
    } elseif (preg_match('/windows|win32/i', $userAgent)) {
        $os = 'Windows';
    } elseif (preg_match('/iphone|ipad|ipod/i', $userAgent)) {
        $os = 'iOS';
    }

    if (preg_match('/MSIE/i', $userAgent) && !preg_match('/Opera/i', $userAgent)) {
        $browser = 'Internet Explorer';
    } elseif (preg_match('/Firefox/i', $userAgent)) {
        $browser = 'Firefox';
    } elseif (preg_match('/Chrome/i', $userAgent)) {
        $browser = 'Chrome';
    } elseif (preg_match('/Safari/i', $userAgent)) {
        $browser = 'Safari';
    } elseif (preg_match('/Opera/i', $userAgent)) {
        $browser = 'Opera';
    } elseif (preg_match('/Netscape/i', $userAgent)) {
        $browser = 'Netscape';
    }

    if (preg_match('/mobile/i', $userAgent)) {
        $device_type = 'Mobile';
    } elseif (preg_match('/tablet/i', $userAgent)) {
        $device_type = 'Tablet';
    } elseif (preg_match('/desktop/i', $userAgent) || preg_match('/windows|mac os x/i', $userAgent)) {
        $device_type = 'Desktop';
    }

    $ip = $_SERVER['REMOTE_ADDR'];
    $country = getCountryFromIP($ip);

    return array(
        'device_name' => $device_name,
        'device_type' => $device_type,
        'os' => $os,
        'browser' => $browser,
        'user_agent' => $userAgent,
        'ip_address' => $ip,
        'country' => $country,
        'time' => date('Y-m-d H:i:s')
    );
}

function saveDeviceInfoToDatabase($conn, $deviceInfo) {
    $device_name = $deviceInfo['device_name'];
    $device_type = $deviceInfo['device_type'];
    $os = $deviceInfo['os'];
    $browser = $deviceInfo['browser'];
    $user_agent = $deviceInfo['user_agent'];
    $ip_address = $deviceInfo['ip_address'];
    $country = $deviceInfo['country'];
    $time = $deviceInfo['time'];

    $sql = "INSERT INTO recent_devices (device_name, device_type, os, browser, user_agent, ip_address, country, time, last_login) VALUES ('$device_name', '$device_type', '$os', '$browser', '$user_agent', '$ip_address', '$country', '$time', '$time') 
            ON DUPLICATE KEY UPDATE last_login='$time'";

    if (mysqli_query($conn, $sql)) {
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        die();
    }
}

// Fungsi untuk mendapatkan negara dari IP menggunakan ipinfo.io
function getCountryFromIP($ip) {
    $apiKey = '958d88dfbd5622'; // Ganti dengan API Key Anda
    $url = "https://ipinfo.io/{$ip}/json?token={$apiKey}";
    $json = file_get_contents($url);
    $details = json_decode($json, true);
    if ($details === NULL || !isset($details['country'])) {
        return 'Unknown Country';
    }
    $countryCode = $details['country'];
    $countryName = countryCodeToName($countryCode);
    return $countryName ? $countryName : 'Unknown Country';
}
function countryCodeToName($code) {
    $countries = array(
        'AF' => 'Afghanistan',
        'AX' => 'Åland Islands',
        'AL' => 'Albania',
        'DZ' => 'Algeria',
        'AS' => 'American Samoa',
        'AD' => 'Andorra',
        'AO' => 'Angola',
        'AI' => 'Anguilla',
        'AQ' => 'Antarctica',
        'AG' => 'Antigua and Barbuda',
        'AR' => 'Argentina',
        'AM' => 'Armenia',
        'AW' => 'Aruba',
        'AU' => 'Australia',
        'AT' => 'Austria',
        'AZ' => 'Azerbaijan',
        'BS' => 'Bahamas',
        'BH' => 'Bahrain',
        'BD' => 'Bangladesh',
        'BB' => 'Barbados',
        'BY' => 'Belarus',
        'BE' => 'Belgium',
        'BZ' => 'Belize',
        'BJ' => 'Benin',
        'BM' => 'Bermuda',
        'BT' => 'Bhutan',
        'BO' => 'Bolivia (Plurinational State of)',
        'BQ' => 'Bonaire, Sint Eustatius and Saba',
        'BA' => 'Bosnia and Herzegovina',
        'BW' => 'Botswana',
        'BV' => 'Bouvet Island',
        'BR' => 'Brazil',
        'IO' => 'British Indian Ocean Territory',
        'BN' => 'Brunei Darussalam',
        'BG' => 'Bulgaria',
        'BF' => 'Burkina Faso',
        'BI' => 'Burundi',
        'CV' => 'Cabo Verde',
        'KH' => 'Cambodia',
        'CM' => 'Cameroon',
        'CA' => 'Canada',
        'KY' => 'Cayman Islands',
        'CF' => 'Central African Republic',
        'TD' => 'Chad',
        'CL' => 'Chile',
        'CN' => 'China',
        'CX' => 'Christmas Island',
        'CC' => 'Cocos (Keeling) Islands',
        'CO' => 'Colombia',
        'KM' => 'Comoros',
        'CG' => 'Congo',
        'CD' => 'Congo, Democratic Republic of the',
        'CK' => 'Cook Islands',
        'CR' => 'Costa Rica',
        'HR' => 'Croatia',
        'CU' => 'Cuba',
        'CW' => 'Curaçao',
        'CY' => 'Cyprus',
        'CZ' => 'Czechia',
        'DK' => 'Denmark',
        'DJ' => 'Djibouti',
        'DM' => 'Dominica',
        'DO' => 'Dominican Republic',
        'EC' => 'Ecuador',
        'EG' => 'Egypt',
        'SV' => 'El Salvador',
        'GQ' => 'Equatorial Guinea',
        'ER' => 'Eritrea',
        'EE' => 'Estonia',
        'SZ' => 'Eswatini',
        'ET' => 'Ethiopia',
        'FK' => 'Falkland Islands (Malvinas)',
        'FO' => 'Faroe Islands',
        'FJ' => 'Fiji',
        'FI' => 'Finland',
        'FR' => 'France',
        'GF' => 'French Guiana',
        'PF' => 'French Polynesia',
        'TF' => 'French Southern Territories',
        'GA' => 'Gabon',
        'GM' => 'Gambia',
        'GE' => 'Georgia',
        'DE' => 'Germany',
        'GH' => 'Ghana',
        'GI' => 'Gibraltar',
        'GR' => 'Greece',
        'GL' => 'Greenland',
        'GD' => 'Grenada',
        'GP' => 'Guadeloupe',
        'GU' => 'Guam',
        'GT' => 'Guatemala',
        'GG' => 'Guernsey',
        'GN' => 'Guinea',
        'GW' => 'Guinea-Bissau',
        'GY' => 'Guyana',
        'HT' => 'Haiti',
        'HM' => 'Heard Island and McDonald Islands',
        'VA' => 'Holy See',
        'HN' => 'Honduras',
        'HK' => 'Hong Kong',
        'HU' => 'Hungary',
        'IS' => 'Iceland',
        'IN' => 'India',
        'ID' => 'Indonesia',
        'IR' => 'Iran (Islamic Republic of)',
        'IQ' => 'Iraq',
        'IE' => 'Ireland',
        'IM' => 'Isle of Man',
        'IL' => 'Israel',
        'IT' => 'Italy',
        'JM' => 'Jamaica',
        'JP' => 'Japan',
        'JE' => 'Jersey',
        'JO' => 'Jordan',
        'KZ' => 'Kazakhstan',
        'KE' => 'Kenya',
        'KI' => 'Kiribati',
        'KP' => 'Korea (Democratic People Republic of)',
        'KR' => 'Korea (Republic of)',
        'KW' => 'Kuwait',
        'KG' => 'Kyrgyzstan',
        'LA' => 'Lao People Democratic Republic',
        'LV' => 'Latvia',
        'LB' => 'Lebanon',
        'LS' => 'Lesotho',
        'LR' => 'Liberia',
        'LY' => 'Libya',
        'LI' => 'Liechtenstein',
        'LT' => 'Lithuania',
        'LU' => 'Luxembourg',
        'MO' => 'Macao',
        'MG' => 'Madagascar',
        'MW' => 'Malawi',
        'MY' => 'Malaysia',
        'MV' => 'Maldives',
        'ML' => 'Mali',
        'MT' => 'Malta',
        'MH' => 'Marshall Islands',
        'MQ' => 'Martinique',
        'MR' => 'Mauritania',
        'MU' => 'Mauritius',
        'YT' => 'Mayotte',
        'MX' => 'Mexico',
        'FM' => 'Micronesia (Federated States of)',
        'MD' => 'Moldova (Republic of)',
        'MC' => 'Monaco',
        'MN' => 'Mongolia',
        'ME' => 'Montenegro',
        'MS' => 'Montserrat',
        'MA' => 'Morocco',
        'MZ' => 'Mozambique',
        'MM' => 'Myanmar',
        'NA' => 'Namibia',
        'NR' => 'Nauru',
        'NP' => 'Nepal',
        'NL' => 'Netherlands',
        'NC' => 'New Caledonia',
        'NZ' => 'New Zealand',
        'NI' => 'Nicaragua',
        'NE' => 'Niger',
        'NG' => 'Nigeria',
        'NU' => 'Niue',
        'NF' => 'Norfolk Island',
        'MK' => 'North Macedonia',
        'MP' => 'Northern Mariana Islands',
        'NO' => 'Norway',
        'OM' => 'Oman',
        'PK' => 'Pakistan',
        'PW' => 'Palau',
        'PS' => 'Palestine, State of',
        'PA' => 'Panama',
        'PG' => 'Papua New Guinea',
        'PY' => 'Paraguay',
        'PE' => 'Peru',
        'PH' => 'Philippines',
        'PN' => 'Pitcairn',
        'PL' => 'Poland',
        'PT' => 'Portugal',
        'PR' => 'Puerto Rico',
        'QA' => 'Qatar',
        'RE' => 'Réunion',
        'RO' => 'Romania',
        'RU' => 'Russian Federation',
        'RW' => 'Rwanda',
        'BL' => 'Saint Barthélemy',
        'SH' => 'Saint Helena, Ascension and Tristan da Cunha',
        'KN' => 'Saint Kitts and Nevis',
        'LC' => 'Saint Lucia',
        'MF' => 'Saint Martin (French part)',
        'PM' => 'Saint Pierre and Miquelon',
        'VC' => 'Saint Vincent and the Grenadines',
        'WS' => 'Samoa',
        'SM' => 'San Marino',
        'ST' => 'Sao Tome and Principe',
        'SA' => 'Saudi Arabia',
        'SN' => 'Senegal',
        'RS' => 'Serbia',
        'SC' => 'Seychelles',
        'SL' => 'Sierra Leone',
        'SG' => 'Singapore',
        'SX' => 'Sint Maarten (Dutch part)',
        'SK' => 'Slovakia',
        'SI' => 'Slovenia',
        'SB' => 'Solomon Islands',
        'SO' => 'Somalia',
        'ZA' => 'South Africa',
        'GS' => 'South Georgia and the South Sandwich Islands',
        'SS' => 'South Sudan',
        'ES' => 'Spain',
        'LK' => 'Sri Lanka',
        'SD' => 'Sudan',
        'SR' => 'Suriname',
        'SJ' => 'Svalbard and Jan Mayen',
        'SE' => 'Sweden',
        'CH' => 'Switzerland',
        'SY' => 'Syrian Arab Republic',
        'TW' => 'Taiwan',
        'TJ' => 'Tajikistan',
        'TZ' => 'Tanzania, United Republic of',
        'TH' => 'Thailand',
        'TL' => 'Timor-Leste',
        'TG' => 'Togo',
        'TK' => 'Tokelau',
        'TO' => 'Tonga',
        'TT' => 'Trinidad and Tobago',
        'TN' => 'Tunisia',
        'TR' => 'Turkey',
        'TM' => 'Turkmenistan',
        'TC' => 'Turks and Caicos Islands',
        'TV' => 'Tuvalu',
        'UG' => 'Uganda',
        'UA' => 'Ukraine',
        'AE' => 'United Arab Emirates',
        'GB' => 'United Kingdom of Great Britain and Northern Ireland',
        'UM' => 'United States Minor Outlying Islands',
        'US' => 'United States of America',
        'UY' => 'Uruguay',
        'UZ' => 'Uzbekistan',
        'VU' => 'Vanuatu',
        'VE' => 'Venezuela (Bolivarian Republic of)',
        'VN' => 'Viet Nam',
        'VG' => 'Virgin Islands (British)',
        'VI' => 'Virgin Islands (U.S.)',
        'WF' => 'Wallis and Futuna',
        'EH' => 'Western Sahara',
        'YE' => 'Yemen',
        'ZM' => 'Zambia',
        'ZW' => 'Zimbabwe',
    );
    return isset($countries[$code]) ? $countries[$code] : null;
}

// Simpan informasi perangkat saat ini ke database
?>