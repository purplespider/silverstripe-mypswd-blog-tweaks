<?php

class CommentExtension extends DataExtension
{

    public function updateCMSFields(FieldList $fields)
    {
        $fields->removeByName("IsSpam");
        $fields->removeByName("URL");
        $fields->addFieldToTab("Root.Main", new ReadonlyField("Email"), "Moderated");
        $fields->addFieldToTab("Root.Main", new ReadonlyField("ParentTitle", "Blog Post"), "Name");
    }

    public function updateSummaryFields(&$fields)
    {
        unset($fields["IsSpam"]);
    }

    public function LinkToken()
    {
        $config = SiteConfig::current_site_config();
        return $realtoken = md5($config->SiteTitle.$this->owner->ID);
    }
}
