# Loom Button

[Loom](https://loom.com) allows users to record their screen, camera, or both at the same time.

The Loom Button brings Loom’s recording capabilities directly to your Moodle site's Atto editor -- no user install (or even user account!) is required for your users to create video content.

Implementation requires you to sign up for a Public App ID through the [Loom Developer Portal](https://www.loom.com/developer-portal).

# Features

* Instant editing of a Loom
* Custom descriptions with timestamps
* Video and GIF embedding (with [Loom Embed plugin](https://github.com/maccmaxitrc/moodle-filter_loom))
* Transcripts
* Custom theming
* All other current and future Loom functionality

For more information on features and limitations, visit the [Loom Developer Documentation](https://dev.loom.com/docs/record-sdk/sdk-standard)

# Installation

1. Download the plugin and extract into *lib/editor/atto/plugins/loom*.
2. Install like any other Moodle plugin (visit Site Administration).
3. Enter your Public App ID recieved from the [Loom Developer Portal](https://www.loom.com/developer-portal). There are also a number of theming options.
4. Add the Loom Button to the Atto editor:
  
   *Site Administration -> Plugins -> Text editors -> Atto HTML editor -> Toolbar config*
  
   ![image](https://user-images.githubusercontent.com/69522645/176002213-63e64f8c-e37a-41b4-844e-9ebb0838ab23.png)
   
# Usage

1. Click on the Loom Button in the Atto editor toolbar:

   ![image](https://user-images.githubusercontent.com/69522645/176008539-5ef1d2a9-758d-4c99-9342-d0c301abaa63.png)

2. You will see the Loom dialogue in the top right of the screen:

   ![image](https://user-images.githubusercontent.com/69522645/176011147-285bd262-33e2-4388-ae48-47cc3cd79510.png)
  
3. When you are finished recording, the share link will be inserted into the editor:

   ![image](https://user-images.githubusercontent.com/69522645/176010520-aec9a7e9-cf05-4ae2-855d-0b64cedf4147.png)

   To turn the share link into an embedded player, install the [Loom Embed plugin](https://github.com/maccmaxitrc/moodle-filter_loom).

#
  
This plugin was developed by [Idaho State University](https://isu.edu)



