# Custom SilverStripe Blog Tweaks

## Introduction

My ideal SilverStripe blogging solution consists of the following modules:

*  [micmania1/silverstripe-blog](https://github.com/micmania1/silverstripe-blogger) (Manages posts in a gridfield rather than the sitetree - optional)
*  [silverstripe/comments](https://github.com/silverstripe/silverstripe-comments)
*  [tractorcow/silverstripe-comments-notifications](https://github.com/tractorcow/silverstripe-comments-notifications)
*  [silverstripe/mollom](https://github.com/silverstripe/silverstripe-mollom)

This module contains a variety of tweaks to these modules that further perfect the solution. I add this module to every SilverStripe blog I do.

## Maintainer Contact ##
 * James Cocker (ssmodulesgithub@pswd.biz)
 
## Requirements
 * Silverstripe 3.1+

## Tweaks Included

### To [SilverStripe Blogger](https://github.com/micmania1/silverstripe-blogger):

* __Blog:__ Hides the redundant dropdown next to the "Add Blog Post" button (using CSS).
* __Blog:__ Added $description static.
* __Blog:__ Sets canCreate so only one blog can be created (keeps page type list tidy for non-admins)
* __Blog:__ Adds custom page icon.
* __Blog:__ Adds default frontend templates & CSS (which can be disabled in config).
* __Blog Post:__ Removed the "MenuTitle" field, as not usually required for blog posts.
* __Blog Post:__ Added a "Manage Posts" button to the top of the CMS EditForm, to allow the user an obvious way back to the posts Gridfield.
* __Blog Post:__ Sets a custom upload location for Featured Image files.
* __Blog Post:__ Hides to the Featured Image upload location.
* __Blog Post:__ Removed the Settings > Visibility section, as not normally applicable to blog posts.
* __Blog Post:__ Adds custom page icon.
* __Blog Post:__ Adds a message below the categories and tags fields telling the user where to go to add them if none exist.
* __Blog Post:__ Adds ability to enable/disable tags/categories in config.
* __Blog Post:__ Adds default frontend templates & CSS (which can be disabled in config).
 
### To [SilverStripe Comments](https://github.com/silverstripe/silverstripe-comments):

* __Comments Admin:__ Removes the bulk action dropdown, and re-adds it with a new "Mark as Moderated" action, and a delete action.
* __Comment:__ Removes the "Is Spam?" field. (Not neccecary for Mollom module)
* __Comment:__ Removes the "URL" field.
* __Comment:__ Makes the comment e-mail address readonly.
* __Comment:__ Adds a readonly "ParentTitle" field to display the name of the page that comment was left on.
* __Comment:__ Removes the "Spam?" summary field.
* __Comment:__ Renamed comment form field labels to keep them short and simple.
* __Comment:__ Moved the line "Your e-mail address will not be published." from the main label, into a "RightTitle".
* __Templates:__ Minor tweaks to remove rarely used features such as RSS feed links.
* __CSS:__ Added some basic CSS to make the default comment styles a bit nicer.

### To [Comments Notification](https://github.com/tractorcow/silverstripe-comments-notifications):

* __Custom E-mail Template:__ Including message if comment needs to be approved, and links to immediately approve/delete the comment from the e-mail.

## Installation

Feel free to pick out any tweaks for use in your own projects, or if you really wish you can install this module as is. (Although be warned I shall be making further adjustments/improvments to the whole solution as time goes on).

### To install:

This module requires Mollom, which currently hasn't been added to Packagist, but does have a composer.json file. To avoid an error when installing this module, add the following to your *composer.json* file first:

```json
{
	"repositories": [
        {
            "type": "git",
            "url": "https://github.com/Mollom/MollomPHP.git"
        }
    ]
}
```

Add the module using Composer:
```bash
composer require purplespider/mypswd-blog-tweaks *
```

Add the following to */mysite/_config/config.yml* to enable spam protection:

```yaml
CommentingController:
  extensions:
      - CommentSpamProtection
FormSpamProtectionExtension:
  default_spam_protector: MollomSpamProtector
Mollom:
  public_key: <Get from mollom.com>
  private_key: <Get from mollom.com>
  dev: false
```

Create a new page of type `Blog`.

Add a Comment Notification Email address in *Settings* if required.

