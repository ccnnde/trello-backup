# MacOS 配置定时任务

如果你希望作业在系统启动时自动执行，并且需要使用管理员权限加载和卸载作业，你需要将 `.plist` 文件保存到 `/Library/LaunchDaemons` 目录中，并使用管理员权限进行操作。

以下是具体的步骤：

1. 创建一个 `.plist` 文件，用于描述你的作业。比如，你可以创建一个名为 `com.example.myjob.plist` 的文件。如果你不确定 `php` 命令的路径是否已经添加到环境变量中，你可以在终端中运行 `which php` 命令来查找它的位置。然后，将该路径替换为 `.plist` 文件中的 `ProgramArguments` 部分

```xml
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
<plist version="1.0">
<dict>
    <key>Label</key>
    <string>com.example.myjob</string>
    <key>ProgramArguments</key>
    <array>
        <string>/usr/bin/php</string>
        <string>/path/to/your/script.php</string>
    </array>
    <key>RunAtLoad</key>
    <true/>
    <key>StartInterval</key>
    <integer>3600</integer>
</dict>
</plist>
```

2. 将 `.plist` 文件保存到 `/Library/LaunchDaemons` 目录中。

```shell
sudo mv com.example.myjob.plist /Library/LaunchDaemons/
```

3. 使用管理员权限加载作业。

```shell
sudo launchctl load /Library/LaunchDaemons/com.example.myjob.plist
```

4. 使用管理员权限卸载作业。

```shell
sudo launchctl unload /Library/LaunchDaemons/com.example.myjob.plist
```

请注意，使用管理员权限加载和卸载作业需要输入管理员密码。

如果你收到 `Load failed: 122: Path had bad ownership/permissions` 错误消息，说明 `launchd` 无法加载 `.plist` 文件，原因是文件的所有者或权限设置不正确。

要解决这个问题，你可以按照以下步骤进行操作：

1. 使用管理员权限执行以下命令，更改 `.plist` 文件的所有者为 `root`：

```shell
sudo chown root /Library/LaunchDaemons/com.example.myjob.plist
```

2. 确保 `.plist` 文件的权限设置正确。使用以下命令将权限设置为 644：

```shell
sudo chmod 644 /Library/LaunchDaemons/com.example.myjob.plist
```

3. 重新加载作业：

```shell
sudo launchctl load /Library/LaunchDaemons/com.example.myjob.plist
```

4. 验证作业是否已经加载：

```shell
sudo launchctl list | grep com.example.myjob
```
