# Setting up WordPress for this theme

## Random Home Hero Images

To get the random image for the home hero, you have to create a field group (e.g. "Single Post Custom Fields").
The field Name should be called home_hero, Field Type > Choice > True/False.

## Set Up Featured Stories

The theme displays the three latest featured stories on the Home Page. To set up, under the field group for Single Posts,
(e.g. "Single Post Custom Fields") create a field called home_featured, Field Type > Choice > True/False.

To set up the portrait image of the featured story, create a custom field "featured_story_image", of Field Type Image. Make sure the return format is "Image Array".

## Set Up Country Stories

The theme displays the three latest featured stories of the country on the country page. Set up is similar to Featured Stories for the Home Page. The naming is "country_featured" for the boolean field. This feature uses the "featured_story_image" to display the portait image in the country page.

## Image Size

Set up the new image sizes: Settings > Media
Medium Size: 800
Large Size: 1170

The theme comes with a default small size at width 540px.

## Category Pages

The theme utilises custom images for category pages, e.g. destinations/europe/iceland
To set up the custom images, we need to add an [ACF for an image in the category page](https://www.advancedcustomfields.com/resources/adding-fields-taxonomy-term/).

Set up ACF for home_hero to generate random home page hero images
