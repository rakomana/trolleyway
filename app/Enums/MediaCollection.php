<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static FeaturedImage()
 * @method static Logo()
 * @method static ProductionStills()
 * @method static ProfilePicture()
 * @method static Trailers()
 * @method static VerificationDocuments()
 * @method static Video()
 */
final class MediaCollection extends Enum
{
    const FeaturedImage = 'featured_image';
    const Logo = 'logo';
    const ProductionStills = 'production_stills';
    const ProfilePicture = 'profile_picture';
    const Trailers = 'trailers';
    const VerificationDocuments = 'verification_documents';
    const Video = 'video';
    const VideoDocuments = 'video_documents';
}
