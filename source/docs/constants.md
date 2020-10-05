---
title: Constants definition
description: Learn about the php constants automatically defined by the framework.
extends: _layouts.documentation
section: content
---

## Defined constants

The framework uses the `Plugin Prefix` [header field](/docs/plugin-setup/) to automatically define the following constants. The example below assumes that the prefix in the header fields has been set to `TD`.

1. `TD_VERSION`: the current version of the plugin.
2. `TD_PLUGIN_FILE`: the full path to the plugin's file.
3. `TD_PLUGIN_BASE`: path to a plugin file relative to the plugins directory, without the leading and trailing slashes.
4. `TD_PLUGIN_DIR`: the filesystem directory path (with trailing slash) for the plugin.
5. `TD_PLUGIN_URL`: the URL directory path (with trailing slash) for the plugin.
