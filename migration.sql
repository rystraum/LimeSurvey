UPDATE lime_settings_global SET stg_value = "FormsGen" WHERE stg_name = "sitename";
ALTER TABLE lime_surveys ADD COLUMN custom_url varchar(255);
