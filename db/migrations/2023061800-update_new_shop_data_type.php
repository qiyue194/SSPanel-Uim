<?php

declare(strict_types=1);

use App\Interfaces\MigrationInterface;
use App\Services\DB;

return new class() implements MigrationInterface {
    public function up(): int
    {
        DB::getPdo()->exec("SET FOREIGN_KEY_CHECKS = 0;
        ALTER TABLE announcement MODIFY COLUMN `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '公告ID';
        ALTER TABLE announcement MODIFY COLUMN `date` datetime NOT NULL DEFAULT '1989-06-04 00:05:00' COMMENT '公告日期';
        ALTER TABLE announcement MODIFY COLUMN `content` text NOT NULL DEFAULT '' COMMENT '公告内容';
        ALTER TABLE config MODIFY COLUMN `value` varchar(2048) DEFAULT NULL COMMENT '值';
        ALTER TABLE detect_ban_log MODIFY COLUMN `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '记录ID';
        ALTER TABLE detect_ban_log MODIFY COLUMN `user_name` varchar(255) NOT NULL DEFAULT '' COMMENT '用户名';
        ALTER TABLE detect_ban_log MODIFY COLUMN `user_id` bigint(20) unsigned NOT NULL DEFAULT 0 COMMENT '用户ID';
        ALTER TABLE detect_ban_log MODIFY COLUMN `email` varchar(255) NOT NULL DEFAULT '' COMMENT '用户邮箱';
        ALTER TABLE detect_ban_log MODIFY COLUMN `detect_number` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '本次违规次数';
        ALTER TABLE detect_ban_log MODIFY COLUMN `ban_time` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '本次封禁时长';
        ALTER TABLE detect_ban_log MODIFY COLUMN `start_time` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '统计开始时间';
        ALTER TABLE detect_ban_log MODIFY COLUMN `end_time` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '统计结束时间';
        ALTER TABLE detect_ban_log MODIFY COLUMN `all_detect_number` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '累计违规次数';
        ALTER TABLE detect_list MODIFY COLUMN `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '审计规则ID';
        ALTER TABLE detect_list MODIFY COLUMN `name` varchar(255) NOT NULL DEFAULT '' COMMENT '规则名称';
        ALTER TABLE detect_list MODIFY COLUMN `text` varchar(255) NOT NULL DEFAULT '' COMMENT '规则名称';
        ALTER TABLE detect_list MODIFY COLUMN `regex` varchar(255) NOT NULL DEFAULT '' COMMENT '正则表达式';
        ALTER TABLE detect_list MODIFY COLUMN `type` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT '规则类型';
        ALTER TABLE detect_log MODIFY COLUMN `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '记录ID';
        ALTER TABLE detect_log MODIFY COLUMN `user_id` bigint(20) unsigned NOT NULL DEFAULT 0 COMMENT '用户ID';
        ALTER TABLE detect_log MODIFY COLUMN `list_id` bigint(20) unsigned NOT NULL DEFAULT 0 COMMENT '规则ID';
        ALTER TABLE detect_log MODIFY COLUMN `datetime` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '触发时间';
        ALTER TABLE detect_log MODIFY COLUMN `node_id` bigint(20) unsigned NOT NULL DEFAULT 0 COMMENT '节点ID';
        ALTER TABLE detect_log MODIFY COLUMN `status` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT '状态';
        ALTER TABLE docs MODIFY COLUMN `date` datetime NOT NULL DEFAULT '1989-06-04 00:05:00' COMMENT '文档日期';
        ALTER TABLE docs MODIFY COLUMN `title` varchar(255) NOT NULL DEFAULT '' COMMENT '文档标题';
        ALTER TABLE docs MODIFY COLUMN `content` longtext NOT NULL DEFAULT '' COMMENT '文档内容';
        ALTER TABLE docs DROP COLUMN IF EXISTS `markdown`;
        ALTER TABLE email_queue MODIFY COLUMN `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '记录ID';
        ALTER TABLE email_queue MODIFY COLUMN `to_email` varchar(255) NOT NULL DEFAULT '' COMMENT '收件人邮箱';
        ALTER TABLE email_queue MODIFY COLUMN `subject` varchar(255) NOT NULL DEFAULT '' COMMENT '邮件标题';
        ALTER TABLE email_queue MODIFY COLUMN `template` varchar(255) NOT NULL DEFAULT '' COMMENT '邮件模板';
        ALTER TABLE email_queue MODIFY COLUMN `array` longtext NOT NULL DEFAULT '{}' COMMENT '模板参数' CHECK (json_valid(`array`));
        ALTER TABLE email_queue MODIFY COLUMN `time` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '添加时间';
        ALTER TABLE gift_card MODIFY COLUMN `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '礼品卡ID';
        ALTER TABLE gift_card MODIFY COLUMN `card` text NOT NULL DEFAULT '' COMMENT '卡号';
        ALTER TABLE gift_card MODIFY COLUMN `balance` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '余额';
        ALTER TABLE gift_card MODIFY COLUMN `create_time` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '创建时间';
        ALTER TABLE gift_card MODIFY COLUMN `status` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT '使用状态';
        ALTER TABLE gift_card MODIFY COLUMN `use_time` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '使用时间';
        ALTER TABLE gift_card MODIFY COLUMN `use_user` bigint(20) unsigned NOT NULL DEFAULT 0 COMMENT '使用用户';
        ALTER TABLE invoice MODIFY COLUMN `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '账单ID';
        ALTER TABLE invoice MODIFY COLUMN `user_id` bigint(20) unsigned DEFAULT 0 COMMENT '归属用户';
        ALTER TABLE invoice MODIFY COLUMN `order_id` bigint(20) unsigned DEFAULT 0 COMMENT '订单ID';
        ALTER TABLE invoice MODIFY COLUMN `content` longtext DEFAULT '{}' COMMENT '账单内容' CHECK (json_valid(`content`));
        ALTER TABLE invoice MODIFY COLUMN `price` double unsigned DEFAULT 0 COMMENT '账单金额';
        ALTER TABLE invoice MODIFY COLUMN `status` varchar(255) DEFAULT '' COMMENT '账单状态';
        ALTER TABLE invoice MODIFY COLUMN `create_time` int(11) unsigned DEFAULT 0 COMMENT '创建时间';
        ALTER TABLE invoice MODIFY COLUMN `update_time` int(11) unsigned DEFAULT 0 COMMENT '更新时间';
        ALTER TABLE invoice MODIFY COLUMN `pay_time` int(11) unsigned DEFAULT 0 COMMENT '支付时间';
        ALTER TABLE link MODIFY COLUMN `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '记录ID';
        ALTER TABLE link MODIFY COLUMN `token` varchar(255) NOT NULL DEFAULT '' COMMENT '订阅token';
        ALTER TABLE link MODIFY COLUMN `userid` bigint(20) unsigned NOT NULL DEFAULT 0 COMMENT '用户ID';
        ALTER TABLE login_ip MODIFY COLUMN `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '记录ID';
        ALTER TABLE login_ip MODIFY COLUMN `userid` bigint(20) unsigned NOT NULL DEFAULT 0 COMMENT '用户ID';
        ALTER TABLE login_ip MODIFY COLUMN `ip` varchar(255) NOT NULL DEFAULT '' COMMENT '登录IP';
        ALTER TABLE login_ip MODIFY COLUMN `datetime` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '登录时间';
        ALTER TABLE login_ip MODIFY COLUMN `type` tinyint(1) unsigned NOT NULL DEFAULT 1 COMMENT '登录类型';
        ALTER TABLE login_ip ADD KEY IF NOT EXISTS `type` (`type`);
        ALTER TABLE node MODIFY COLUMN `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '节点ID';
        ALTER TABLE node MODIFY COLUMN `name` varchar(255) NOT NULL DEFAULT '' COMMENT '节点名称';
        ALTER TABLE node MODIFY COLUMN `type` tinyint(1) unsigned NOT NULL DEFAULT 1 COMMENT '节点显示';
        ALTER TABLE node MODIFY COLUMN `server` varchar(255) NOT NULL DEFAULT '' COMMENT '节点地址';
        ALTER TABLE node MODIFY COLUMN `custom_config` longtext NOT NULL DEFAULT '{}' COMMENT '自定义配置' CHECK (json_valid(`custom_config`));
        ALTER TABLE node MODIFY COLUMN `info` varchar(255) NOT NULL DEFAULT '' COMMENT '节点信息';
        ALTER TABLE node MODIFY COLUMN `status` varchar(255) NOT NULL DEFAULT '' COMMENT '节点状态';
        ALTER TABLE node MODIFY COLUMN `sort` tinyint(2) unsigned NOT NULL DEFAULT 14 COMMENT '节点类型';
        ALTER TABLE node MODIFY COLUMN `traffic_rate` float unsigned NOT NULL DEFAULT 1 COMMENT '流量倍率';
        ALTER TABLE node MODIFY COLUMN `node_class` smallint(5) unsigned NOT NULL DEFAULT 0 COMMENT '节点等级';
        ALTER TABLE node MODIFY COLUMN `node_speedlimit` double unsigned NOT NULL DEFAULT 0 COMMENT '节点限速';
        ALTER TABLE node MODIFY COLUMN `node_bandwidth` bigint(20) unsigned NOT NULL DEFAULT 0 COMMENT '节点流量';
        ALTER TABLE node MODIFY COLUMN `node_bandwidth_limit` bigint(20) unsigned NOT NULL DEFAULT 0 COMMENT '节点流量限制';
        ALTER TABLE node MODIFY COLUMN `bandwidthlimit_resetday` tinyint(2) unsigned NOT NULL DEFAULT 0 COMMENT '流量重置日';
        ALTER TABLE node MODIFY COLUMN `node_heartbeat` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '节点心跳';
        ALTER TABLE node MODIFY COLUMN `online_user` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '节点在线用户';
        ALTER TABLE node MODIFY COLUMN `node_ip` varchar(255) NOT NULL DEFAULT '' COMMENT '节点IP';
        ALTER TABLE node MODIFY COLUMN `node_group` smallint(5) unsigned NOT NULL DEFAULT 0 COMMENT '节点群组';
        ALTER TABLE node MODIFY COLUMN `online` tinyint(1) NOT NULL DEFAULT 1 COMMENT '在线状态';
        ALTER TABLE node MODIFY COLUMN `gfw_block` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT '是否被GFW封锁';
        ALTER TABLE node MODIFY COLUMN `password` varchar(255) NOT NULL DEFAULT '' COMMENT '后端连接密码';
        ALTER TABLE node DROP COLUMN IF EXISTS `node_connector`;
        ALTER TABLE node DROP COLUMN IF EXISTS `mu_only`;
        ALTER TABLE node ADD KEY IF NOT EXISTS `type` (`type`);
        ALTER TABLE node ADD KEY IF NOT EXISTS `sort` (`sort`);
        ALTER TABLE node ADD KEY IF NOT EXISTS `node_class` (`node_class`);
        ALTER TABLE node ADD KEY IF NOT EXISTS `node_group` (`node_group`);
        ALTER TABLE node ADD KEY IF NOT EXISTS `online` (`online`);
        ALTER TABLE online_log MODIFY COLUMN `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '记录ID';
        ALTER TABLE online_log MODIFY COLUMN `user_id` bigint(20) unsigned NOT NULL COMMENT '用户ID';
        ALTER TABLE online_log MODIFY COLUMN `ip` inet6 NOT NULL COMMENT 'IP地址';
        ALTER TABLE online_log MODIFY COLUMN `node_id` int(11) unsigned NOT NULL COMMENT '节点ID';
        ALTER TABLE online_log MODIFY COLUMN `first_time` int(11) unsigned NOT NULL COMMENT '首次在线时间';
        ALTER TABLE online_log MODIFY COLUMN `last_time` int(11) unsigned NOT NULL COMMENT '最后在线时间';
        ALTER TABLE `order` MODIFY COLUMN `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单ID';
        ALTER TABLE `order` MODIFY COLUMN `user_id` bigint(20) unsigned NOT NULL DEFAULT 0 COMMENT '提交用户';
        ALTER TABLE `order` MODIFY COLUMN `product_id` bigint(20) unsigned NOT NULL DEFAULT 0 COMMENT '商品ID';
        ALTER TABLE `order` MODIFY COLUMN `product_type` varchar(255) NOT NULL DEFAULT '' COMMENT '商品类型';
        ALTER TABLE `order` MODIFY COLUMN `product_name` varchar(255) NOT NULL DEFAULT '' COMMENT '商品名称';
        ALTER TABLE `order` MODIFY COLUMN `product_content` longtext NOT NULL DEFAULT '{}' COMMENT '商品内容' CHECK (json_valid(`product_content`));
        ALTER TABLE `order` MODIFY COLUMN `coupon` varchar(255) NOT NULL DEFAULT '' COMMENT '订单优惠码';
        ALTER TABLE `order` MODIFY COLUMN `price` double unsigned NOT NULL DEFAULT 0 COMMENT '订单金额';
        ALTER TABLE `order` MODIFY COLUMN `status` varchar(255) NOT NULL DEFAULT '' COMMENT '订单状态';
        ALTER TABLE `order` MODIFY COLUMN `create_time` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '创建时间';
        ALTER TABLE `order` MODIFY COLUMN `update_time` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '更新时间';
        ALTER TABLE payback MODIFY COLUMN `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '记录ID';
        ALTER TABLE payback MODIFY COLUMN `total` decimal(12,2) unsigned NOT NULL DEFAULT 0 COMMENT '总金额';
        ALTER TABLE payback MODIFY COLUMN `userid` bigint(20) unsigned NOT NULL DEFAULT 0 COMMENT '用户ID';
        ALTER TABLE payback MODIFY COLUMN `ref_by` bigint(20) unsigned NOT NULL DEFAULT 0 COMMENT '推荐人ID';
        ALTER TABLE payback MODIFY COLUMN `ref_get` decimal(12,2) unsigned NOT NULL DEFAULT 0 COMMENT '推荐人获得金额';
        ALTER TABLE payback MODIFY COLUMN `datetime` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '创建时间';
        ALTER TABLE paylist MODIFY COLUMN `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '记录ID';
        ALTER TABLE paylist MODIFY COLUMN `userid` bigint(20) unsigned NOT NULL DEFAULT 0 COMMENT '用户ID';
        ALTER TABLE paylist MODIFY COLUMN `total` decimal(12,2) NOT NULL DEFAULT 0 COMMENT '总金额';
        ALTER TABLE paylist MODIFY COLUMN `status` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT '状态';
        ALTER TABLE paylist MODIFY COLUMN `invoice_id` bigint(20) unsigned NOT NULL DEFAULT 0 COMMENT '账单ID';
        ALTER TABLE paylist MODIFY COLUMN `tradeno` varchar(255) NOT NULL DEFAULT '' COMMENT '网关单号';
        ALTER TABLE paylist MODIFY COLUMN `gateway` varchar(255) NOT NULL DEFAULT '' COMMENT '支付网关';
        ALTER TABLE paylist MODIFY COLUMN `datetime` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '创建时间';
        ALTER TABLE product MODIFY COLUMN `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品ID';
        ALTER TABLE product MODIFY COLUMN `type` varchar(255) NOT NULL DEFAULT 'tabp' COMMENT '类型';
        ALTER TABLE product MODIFY COLUMN `name` varchar(255) NOT NULL DEFAULT '' COMMENT '名称';
        ALTER TABLE product MODIFY COLUMN `price` double unsigned NOT NULL DEFAULT 0 COMMENT '售价';
        ALTER TABLE product MODIFY COLUMN `content` longtext NOT NULL DEFAULT '{}' COMMENT '内容' CHECK (json_valid(`content`));
        ALTER TABLE product MODIFY COLUMN `limit` longtext NOT NULL DEFAULT '{}' COMMENT '购买限制' CHECK (json_valid(`limit`));
        ALTER TABLE product MODIFY COLUMN `status` tinyint(1) unsigned NOT NULL DEFAULT 1 COMMENT '销售状态';
        ALTER TABLE product MODIFY COLUMN `create_time` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '创建时间';
        ALTER TABLE product MODIFY COLUMN `update_time` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '更新时间';
        ALTER TABLE product MODIFY COLUMN `sale_count` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '累计销售数';
        ALTER TABLE product MODIFY COLUMN `stock` int(11) NOT NULL DEFAULT -1 COMMENT '库存';
        ALTER TABLE product ADD KEY IF NOT EXISTS `status` (`status`);
        ALTER TABLE ticket MODIFY COLUMN `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '工单ID';
        ALTER TABLE ticket MODIFY COLUMN `title` varchar(255) NOT NULL DEFAULT '' COMMENT '工单标题';
        ALTER TABLE ticket MODIFY COLUMN `content` longtext NOT NULL DEFAULT '{}' COMMENT '工单内容' CHECK (json_valid(`content`));
        ALTER TABLE ticket MODIFY COLUMN `userid` bigint(20) unsigned NOT NULL DEFAULT 0 COMMENT '用户ID';
        ALTER TABLE ticket MODIFY COLUMN `datetime` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '创建时间';
        ALTER TABLE ticket MODIFY COLUMN `status` varchar(255) NOT NULL DEFAULT '' COMMENT '工单状态';
        ALTER TABLE ticket MODIFY COLUMN `type` varchar(255) NOT NULL DEFAULT '' COMMENT '工单类型';
        ALTER TABLE ticket ADD KEY IF NOT EXISTS `userid` (`userid`);
        ALTER TABLE ticket ADD KEY IF NOT EXISTS `status` (`status`);
        ALTER TABLE user MODIFY COLUMN `class` smallint(5) unsigned NOT NULL DEFAULT 0 COMMENT '等级';
        ALTER TABLE user DROP COLUMN IF EXISTS `node_connector`;
        ALTER TABLE user_coupon MODIFY COLUMN `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '优惠码ID';
        ALTER TABLE user_coupon MODIFY COLUMN `code` varchar(255) NOT NULL DEFAULT '' COMMENT '优惠码';
        ALTER TABLE user_coupon MODIFY COLUMN `content` longtext NOT NULL DEFAULT '{}' COMMENT '优惠码内容' CHECK (json_valid(`content`));
        ALTER TABLE user_coupon MODIFY COLUMN `limit` longtext NOT NULL DEFAULT '{}' COMMENT '优惠码限制' CHECK (json_valid(`limit`));
        ALTER TABLE user_coupon MODIFY COLUMN `use_count` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '累计使用次数';
        ALTER TABLE user_coupon MODIFY COLUMN `create_time` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '创建时间';
        ALTER TABLE user_coupon MODIFY COLUMN `expire_time` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '过期时间';
        ALTER TABLE user_hourly_usage MODIFY COLUMN `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '记录ID';
        ALTER TABLE user_hourly_usage MODIFY COLUMN `user_id` bigint(20) unsigned NOT NULL DEFAULT 0 COMMENT '用户ID';
        ALTER TABLE user_hourly_usage MODIFY COLUMN `traffic` bigint(20) unsigned NOT NULL DEFAULT 0 COMMENT '当前总流量';
        ALTER TABLE user_hourly_usage MODIFY COLUMN `hourly_usage` bigint(20) unsigned NOT NULL DEFAULT 0 COMMENT '过去一小时流量';
        ALTER TABLE user_hourly_usage MODIFY COLUMN `datetime` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '记录时间';
        ALTER TABLE user_invite_code MODIFY COLUMN `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '记录ID';
        ALTER TABLE user_invite_code MODIFY COLUMN `code` varchar(255) NOT NULL DEFAULT '' COMMENT '邀请码';
        ALTER TABLE user_invite_code MODIFY COLUMN `user_id` bigint(20) unsigned NOT NULL DEFAULT 0 COMMENT '用户ID';
        ALTER TABLE user_invite_code MODIFY COLUMN `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '创建时间';
        ALTER TABLE user_invite_code MODIFY COLUMN `updated_at` timestamp NOT NULL DEFAULT '1989-06-04 00:05:00' COMMENT '更新时间';
        ALTER TABLE user_money_log MODIFY COLUMN `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '记录ID';
        SET FOREIGN_KEY_CHECKS = 1;");

        return 2023061800;
    }

    public function down(): int
    {
        return 2023061800;
    }
};