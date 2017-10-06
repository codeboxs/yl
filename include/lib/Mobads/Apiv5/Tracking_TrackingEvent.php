<?php
/**
 * Auto generated from baidu_mobads_api_5_php.proto at 2016-09-13 16:08:23
 *
 * mobads.apiv5 package
 */

namespace Mobads\Apiv5 {
/**
 * TrackingEvent enum embedded in Tracking message
 */
final class Tracking_TrackingEvent
{
    const AD_CLICK = 0;
    const AD_EXPOSURE = 1;
    const AD_CLOSE = 2;
    const VIDEO_AD_START = 101000;
    const VIDEO_AD_FULL_SCREEN = 101001;
    const VIDEO_AD_END = 101002;
    const VIDEO_AD_START_CARD_CLICK = 101003;
    const APP_AD_DOWNLOAD = 102000;
    const APP_AD_INSTALL = 102001;
    const APP_AD_ACTIVE = 102002;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'AD_CLICK' => self::AD_CLICK,
            'AD_EXPOSURE' => self::AD_EXPOSURE,
            'AD_CLOSE' => self::AD_CLOSE,
            'VIDEO_AD_START' => self::VIDEO_AD_START,
            'VIDEO_AD_FULL_SCREEN' => self::VIDEO_AD_FULL_SCREEN,
            'VIDEO_AD_END' => self::VIDEO_AD_END,
            'VIDEO_AD_START_CARD_CLICK' => self::VIDEO_AD_START_CARD_CLICK,
            'APP_AD_DOWNLOAD' => self::APP_AD_DOWNLOAD,
            'APP_AD_INSTALL' => self::APP_AD_INSTALL,
            'APP_AD_ACTIVE' => self::APP_AD_ACTIVE,
        );
    }
}
}