-- -----------------------------------------------------------------------------------------------------------------
--
-- -----------------------------------------------------------------------------------------------------------------
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

# = IA GROUPS
# =============================
drop table if exists ia_groups;
CREATE TABLE `ia_groups` (
  `group_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `commnet` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
INSERT INTO `ia_groups` (`group_id`, `plan_id`, `name`, `status`, `user_id`, `updated_at`, `commnet`) VALUES
(1, 1, '601', 1, 1, '2019-07-04 00:45:46', NULL);
ALTER TABLE `ia_groups` ADD PRIMARY KEY (`group_id`);
ALTER TABLE `ia_groups` MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

# = IA PLANS
# =============================
drop table if exists ia_plans;
CREATE TABLE `ia_plans` (
  `plan_id` int(11) NOT NULL,
  `short_name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `commnet` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `ia_plans` (`plan_id`, `short_name`, `description`, `status`, `user_id`, `updated_at`, `commnet`) VALUES
(1, 'TI', 'TÉCNICO EN INFORMÁTICA', 1, 1, '2019-07-04 00:35:17', NULL);
ALTER TABLE `ia_plans` ADD PRIMARY KEY (`plan_id`);
ALTER TABLE `ia_plans` MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


# = IA RECORDS
# =============================
drop table if exists ia_records;
CREATE TABLE `ia_records` (
  `record_id` int(11) NOT NULL,
  `code` text COLLATE utf8_spanish_ci,
  `plan_id` int(11) DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `student_name` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `student_email` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `invited_list` text COLLATE utf8_spanish_ci,
  `date_registred` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
ALTER TABLE `ia_records` ADD PRIMARY KEY (`record_id`);
ALTER TABLE `ia_records` MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1; COMMIT;


# = IA SESSIONS
# =============================
drop table if exists ia_sessions;
CREATE TABLE `ia_sessions` (
  `id` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `user_agent` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `timestamp` int(10) NOT NULL,
  `data` blob DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
