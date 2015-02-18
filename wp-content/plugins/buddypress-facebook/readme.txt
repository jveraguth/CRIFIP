=== BuddyPress Facebook ===
Contributors: Samuel Costa
Tags: buddypress, buddypress member, buddypress facebook, facebook
Requires at least: 3.2.1
Tested up to: 3.4.1
BuddyPress: 1.5.6
Stable tag: 0.3
License: See readme.txt file.

== Description ==


Let your members and groups show their Facebook Button on their profile page and group page. 

Using full Facebook URL (www.facebook.com/username), the plugin fetches your members and/or groups username and displays their button in the member's/group's header.

If your BuddyPress community is active on Facebook, this plugin is a great tool for boosting communication both on and off your website.
It's really easy to setup, even if you have an existing community:

Members: Once you ( the site admin ) have set up the members component, all your members have to do is enter in their full Facebook URL and existing members via editing their profile settings.

Groups: Once you ( the site admin ) have set up the groups component, all your group admins have to do is enter in their associated full Facebook URL when they create a group and existing groups via editing their group's details.


== Installation ==


= Automatic Installation =

1. From inside your WordPress administration panel, visit 'Plugins -> Add New'
2. Search for `BuddyPress Facebook` and find this plugin in the results
3. Click 'Install'
4. Once installed, activate via the 'Plugins -> Installed' page
5. From your admin panel, navigate to 'Buddypress' -> 'Profile fields'
6. Click 'Add New Field' and give the field a title
7. From your admin panel, navigate to 'Buddypress' -> 'Buddypress Facebook'
8. Enable the 'Members' option and save
9. Name 'Mirror Profile Field Title' the same as your title from step 6

= Manual Installation =

1. Upload `buddypress-facebook` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. From your admin panel, navigate to 'Buddypress' -> 'Profile fields'
4. Click 'Add New Field' and give the field a title
5. From your admin panel, navigate to 'Buddypress' -> 'Buddypress Facebook'
6. Enable the 'Members' option and save
7. Name 'Mirror Profile Field Title' the same as your title from step 6


== Screenshots ==


1. Members/groups can display Facebook button


== Notes ==


License.txt - contains the licensing details for this component.


== Frequently Asked Questions ==


= What is the 'Group Field Title' for? =

The group field title is the title that will be displayed right above the text box where the group will enter in their complete Facebook URL: www.facebook.com/username.

= Will the 'Mirror Profile Field Title' also be displayed above the text box where the member will enter in their Facebook name.? =

No, the text box will use the title you gave your Xprofile field as described in step 6 of the plugin installation instructions. The 'Mirror Profile Field Title' is used to fetch the members meta ( attached data ) though if the two differ, no data will be returned thus no button will display.


= More Information =


More informations (in portuguese): http://www.artewebdesign.com.br/plugin-para-wordpress-buddypress-facebook/


== Changelog ==


= 0.2 =

* Change the user after the URL for the full URL

= 0.1 =

* initial release in base of the Charl Kruger Buddypress Twitter Plugin.