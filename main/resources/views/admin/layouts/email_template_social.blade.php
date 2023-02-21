@if ((string)$siteSetting->facebook_address !== '')
<span style="margin-right:3px;"> <a href="{{ $siteSetting->facebook_address }}"><img src="{{ asset('/') }}admin_assets/images/small_social_icons/if_facebook_278425.png" alt="Facebook"></a> </span>
@endif


@if ((string)$siteSetting->twitter_address !== '')
<span style="margin-right:3px;"><a href="{{ $siteSetting->twitter_address }}"><img src="{{ asset('/') }}admin_assets/images/small_social_icons/if_twitter_278411.png" alt="Twitter"></a></span>
@endif
@if ((string)$siteSetting->instagram_address !== '')
<span style="margin-right:3px;"><a href="{{ $siteSetting->instagram_address }}"><img src="{{ asset('/') }}admin_assets/images/small_social_icons/if_instagram_278420.png" alt="Instagram"></a></span>
@endif
@if ((string)$siteSetting->linkedin_address !== '')
<span style="margin-right:3px;"><a href="{{ $siteSetting->linkedin_address }}"><img src="{{ asset('/') }}admin_assets/images/small_social_icons/if_linkedin_278419.png" alt="Linkedin"></a></span>
@endif
@if ((string)$siteSetting->youtube_address !== '')
<span style="margin-right:3px;"><a href="{{ $siteSetting->youtube_address }}"><img src="{{ asset('/') }}admin_assets/images/small_social_icons/if_yt_278407.png" alt="YouTube"></a></span>
@endif

