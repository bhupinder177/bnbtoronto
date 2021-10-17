@php

$form_data = [
		'page_title'=> 'Social Setting Form',
		'page_subtitle'=> 'Social Setting Page', 
		'form_name' => 'Social Setting Page', 
		'form_id' => 'social_setting',
		'action' => URL::to('/').'/admin/settings/social-links',
    'action2' => URL::to('/').'/admin/settings/add-social-links',
		 'fields'=>[]
	];

  $socialFeeds = [
          ['type' => 'text', 'class' => '', 'label' => 'Facebook', 'name' => 'facebook', 'value' => 'Facebook'],

          ['type' => 'text', 'class' => '', 'label' => 'Google Plus', 'name' => 'facebook', 'value' => 'Google Plus'],
  ];

foreach ($sociallist as $socialf){
  $form_data['fields'][]= $socialf;
}





@endphp



<!-- [


      ['type' => 'text', 'class' => '', 'label' => 'Facebook', 'name' => 'facebook', 'value' => $result['facebook']],
          ['type' => 'text', 'class' => '', 'label' => 'Google Plus', 'name' => 'google_plus', 'value' => $result['google_plus']],
          ['type' => 'text', 'class' => '', 'label' => 'Twitter', 'name' => 'twitter', 'value' => $result['twitter']],
          ['type' => 'text', 'class' => '', 'label' => 'Linkedin', 'name' => 'linkedin', 'value' => $result['linkedin']],
          ['type' => 'text', 'class' => '', 'label' => 'Pinterest', 'name' => 'pinterest', 'value' => $result['pinterest']],
          ['type' => 'text', 'class' => '', 'label' => 'Youtube', 'name' => 'youtube', 'value' => $result['youtube']],
          ['type' => 'text', 'class' => '', 'label' => 'Instagram', 'name' => 'instagram', 'value' => $result['instagram']],

    ]
 -->




@include("admin.common.form.setting", $form_data)

<script type="text/javascript">
   $(document).ready(function () {

            $('#social_setting').validate({
                rules: {
                    facebook: {
                        required: true
                    },
                    google_plus: {
                        required: true
                    },
                    twitter: {
                        required: true
                    },
                    linkedin: {
                        required: true
                    },
                    pinterest: {
                        required: true
                    },
                    youtube: {
                        required: true
                    },
                    instagram: {
                        required: true
                    }

                }
            });

        });
</script>