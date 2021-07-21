<?php

namespace Modules\Address\Service;

class StreetType
{
    private static $streetTypes = [
        'ALLEY' => 'AL',
        'AMBLE' => 'AMB',
        'APPROACH' => 'APPR',
        'ARCADE' => 'ARC',
        'ARTERIAL' => 'ART',
        'AVENUE' => 'AV',
        'BAY' => 'BAY',
        'BEND' => 'BEND',
        'BRAE' => 'BRAE',
        'BREAK' => 'BRK',
        'BOULEVARD' => 'BVD',
        'BOARDWALK' => 'BWK',
        'BOWL' => 'BWL',
        'BYPASS' => 'BYP',
        'CIRCLE' => 'CCL',
        'CIRCUS' => 'CCS',
        'CIRCUIT' => 'CCT',
        'CHASE' => 'CHA',
        'CLOSE' => 'CL',
        'CORNER' => 'CNR',
        'COMMON' => 'COM',
        'CONCOURSE' => 'CON,',
        'CRESCENT' => 'CR',
        'CROSS' => 'CROS',
        'COURSE' => 'CRSE',
        'CREST' => 'CRST',
        'CRUISEWAY' => 'CRY',
        'COURT' => 'CT',
        'COVE' => 'CV',
        'DALE' => 'DALE',
        'DELL' => 'DELL',
        'DENE' => 'DENE',
        'DIVIDE' => 'DIV',
        'DOMAIN' => 'DOM',
        'DRIVE' => 'DR',
        'EAST' => 'EAST',
        'EDGE' => 'EDG',
        'ENTRANCE' => 'ENT',
        'ESPLANADE' => 'ESP',
        'EXTENSION' => 'EXTN',
        'FLATS' => 'FLTS',
        'FORD' => 'FORD',
        'FREEWAY' => 'FWY',
        'GATE' => 'GATE',
        'GARDEN' => 'GDN',
        'GLADE' => 'GLA',
        'GLEN' => 'GLN',
        'GULLY' => 'GLY',
        'GRANGE' => 'GRA',
        'GREEN' => 'GRN',
        'GROVE' => 'GV',
        'GATEWAY' => 'GWY',
        'HILL' => 'HILL',
        'HOLLOW' => 'HLW',
        'HEATH' => 'HTH',
        'HEIGHTS' => 'HTS',
        'HUB' => 'HUB',
        'HIGHWAY' => 'HWY',
        'ISLAND' => 'ID',
        'JUNCTION' => 'JCT',
        'LANE' => 'LA',
        'LINK' => 'LNK',
        'LOOP' => 'LOOP',
        'LOWER' => 'LWR',
        'LANEWAY' => 'LWY',
        'MALL' => 'MALL',
        'MEW' => 'MEW',
        'MEWS' => 'MWS',
        'NOOK' => 'NOOK',
        'NORTH' => 'NTH',
        'OUTLOOK' => 'OUT',
        'PATH' => 'PATH',
        'PARADE' => 'PD/PDE',
        'POCKET' => 'PKT',
        'PARKWAY' => 'PKW',
        'PLACE' => 'PL',
        'PLAZA' => 'PLZ',
        'PROMENADE' => 'PRM',
        'PASS' => 'PS',
        'PASSAGE' => 'PSG',
        'POINT' => 'PT',
        'PURSUIT' => 'PUR',
        'PATHWAY' => 'PWAY',
        'QUADRANT' => 'QD',
        'QUAY' => 'QU',
        'REACH' => 'RCH',
        'ROAD' => 'RD',
        'RIDGE' => 'RDG',
        'RESERVE' => 'REST',
        'REST' => 'REST',
        'RETREAT' => 'RET',
        'RIDE' => 'RIDE',
        'RISE' => 'RISE',
        'ROUND' => 'RND',
        'ROW' => 'ROW',
        'RISING' => 'RSG',
        'RETURN' => 'RTN',
        'RUN' => 'RUN',
        'SLOPE' => 'SLO',
        'SQUARE' => 'SQ',
        'STREET' => 'ST',
        'SOUTH' => 'STH',
        'STRIP' => 'STP',
        'STEPS' => 'STPS',
        'SUBWAY' => 'SUB',
        'TERRACE' => 'TCE',
        'THROUGHWAY' => 'THRU',
        'TOR' => 'TOR',
        'TRACK' => 'TRK',
        'TRAIL' => 'TRL',
        'TURN' => 'TURN',
        'TOLLWAY' => 'TWY',
        'UPPER' => 'UPR',
        'VALLEY' => 'VLY',
        'VISTA' => 'VST',
        'VIEW' => 'VW',
        'WAY' => 'WAY',
        'WOOD' => 'WD',
        'WEST' => 'WEST',
        'WALK' => 'WK',
        'WALKWAY' => 'WKWY',
        'WATERS' => 'WTRS',
        'WATERWAY' => 'WRY',
        'WYND' => 'WYD',

    ];

    public static function toArray(): array
    {
        return self::$streetTypes;
    }

    public static function exist(string $name): bool
    {
        $name  = strtoupper($name);

        return array_key_exists($name, self::$streetTypes) || in_array($name, self::$streetTypes);
    }

    public static function getLabel(string $value): ?string
    {
        $value = strtoupper($value);
        $str = null;

        if(array_key_exists($value, self::$streetTypes)) {
            $str = $value;
        } else {
            $key = array_search($value, self::$streetTypes);
            if($key) {
                $str = $key;
            }
        }

        return $str;
    }

    public static function getValue(string $label): ?string
    {
        $value = null;

        $label = strtoupper($label);

        if(array_key_exists($label, self::$streetTypes)) {
            $value = self::$streetTypes[$label];
        } elseif (in_array($label, self::$streetTypes)) {
            $value = $label;
        }

        return $value;
    }
}
