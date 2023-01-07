CREATE DATABASE Dr;
CREATE USER "UserDr"@"localhost" IDENTIFIED WITH mysql_native_password BY "123!@#";
GRANT ALL PRIVILEGES ON Dr.* TO "UserDr"@"localhost";
ALTER USER 'UserDr'@'localhost' IDENTIFIED WITH mysql_native_password BY '123!@#';
USE Dr;
CREATE TABLE `Users` (
                         `UserId` int unsigned NOT NULL,
                         `Username` varchar(12) NOT NULL,
                         `Password` char(60) NOT NULL,
                         `Email` varchar(40) NOT NULL,
                         `PhoneNumber` varchar(15) DEFAULT NULL,
                         `SubscriptionDate` date NOT NULL,
                         `LastLogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                         `GroupId` tinyint unsigned NOT NULL,
                         `Status` tinyint NOT NULL DEFAULT '1',
                         `FailedLogin` tinyint unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
INSERT INTO `Users` (`UserId`, `Username`, `Password`, `Email`, `PhoneNumber`, `SubscriptionDate`, `LastLogin`, `GroupId`, `Status`, `FailedLogin`) VALUES
                                                                                                                                                    (1, 'Doctor', '601f1889667efaebb33b8c12572835da3f027f78', 'Doctor@wise.edu.jo', '0788888881', '2023-1-1', '2023-1-1 00:00:00', 1, 1, 0),
                                                                                                                                                    (2, 'Lap Official', '601f1889667efaebb33b8c12572835da3f027f78', 'lap_official@wise.edu.jo', '0788888882', '2023-1-1', '2023-1-1 00:00:00', 2, 1, 3),
                                                                                                                                                    (3, 'Nurse', '601f1889667efaebb33b8c12572835da3f027f78', 'Nurse@wise.edu.jo', '0788888883', '2023-1-1', '2023-1-1 00:00:00', 3, 0, 0);
CREATE TABLE `Users_Groups` (
                                `GroupId` tinyint UNSIGNED NOT NULL,
                                `GroupName_En` varchar(20) NOT NULL,
                                `GroupName_Ar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
INSERT INTO `Users_Groups` (`GroupId`, `GroupName_En`, `GroupName_Ar`) VALUES
                                                                           (1, 'Doctor', 'دكتور'),
                                                                           (2, 'Lab official', 'مشرف المختبر'),
                                                                           (3, 'Pharmacist', ' صيدلاني');
CREATE TABLE `Users_Groups_Privileges` (
                                           `Id` tinyint UNSIGNED NOT NULL,
                                           `GroupId` tinyint UNSIGNED NOT NULL,
                                           `PrivilegeId` tinyint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
INSERT INTO `Users_Groups_Privileges` (`Id`, `GroupId`, `PrivilegeId`) VALUES
                                                                           (1, 1, 1),
                                                                           (2, 1, 2),
                                                                           (3, 1, 3),
                                                                           (4, 1, 4),
                                                                           (5, 1, 5),
                                                                           (6, 1, 6),
                                                                           (7, 1, 7),
                                                                           (8, 1, 8),
                                                                           (9, 1, 9);

CREATE TABLE `Users_Privileges` (
                                    `PrivilegeId` tinyint UNSIGNED NOT NULL,
                                    `PrivilegeName_En` varchar(30) NOT NULL,
                                    `PrivilegeName_Ar` varchar(30) NOT NULL,
                                    `Privilege_URL` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
INSERT INTO `Users_Privileges` (`PrivilegeId`, `PrivilegeName_En`, `PrivilegeName_Ar`, `Privilege_URL`) VALUES
                                                                                                            (1, 'Create user', 'انشاء مستخدم', '/users/create'),
                                                                                                            (2, 'Edit user', 'تعديل مستخدم', '/users/edit'),
                                                                                                            (3, 'Delete user', 'حذف مستخدم', '/users/delete'),
                                                                                                            (4, 'View user', 'مشاهدة المستخدمين', '/users/default'),
                                                                                                            (5, 'View system settings', 'مشاهدة اعدادات النظام', '/settings/default'),
                                                                                                            (6, 'View Privileges', 'مشاهدة الصلاحيات', '/privileges/default'),
                                                                                                            (7, 'Create Privileges', 'اضافة صلاحية جديدة', '/privileges/create'),
                                                                                                            (8, 'Delete Privileges', 'حذف صلاحية', '/privileges/delete'),
                                                                                                            (9, 'Edit Privileges', 'التعديل على الصلاحيات', '/privileges/edit');

CREATE TABLE `Users_Profiles` (
                                  `UserId` int UNSIGNED NOT NULL,
                                  `FirstName_En` varchar(50) NOT NULL,
                                  `LastName_En` varchar(50) NOT NULL,
                                  `Address_En` varchar(50) DEFAULT NULL,
                                  `FirstName_Ar` varchar(50) NOT NULL,
                                  `LastName_Ar` varchar(50) NOT NULL,
                                  `Address_Ar` varchar(50) DEFAULT NULL,
                                  `DOB` date DEFAULT NULL,
                                  `Image` varchar(30) DEFAULT 'style/img/avatar.webp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
INSERT INTO `Users_Profiles` (`UserId`, `FirstName_En`, `LastName_En`, `Address_En`, `FirstName_Ar`, `LastName_Ar`, `Address_Ar`, `DOB`, `Image`) VALUES

                                                                                                                                                      (1, 'Issa', 'Al-Atoum', 'Jordan', 'عيسى', 'العتوم', 'الاردن', '1975-1-1', 'style/img/Issa.png'),
                                                                                                                                                      (2, 'Ali', 'Al-Naimat', 'Jordan', 'علي', 'النعمات', 'الاردن', '1982-5-20', 'style/img/Ali.png'),
                                                                                                                                               (3, 'Safa', 'Al-Sarayrah', 'Jordan', 'صفاء', 'الصرايرة', 'الاردن', '1984-10-26', 'style/img/Safa.png');
ALTER TABLE `Users`
    ADD PRIMARY KEY (`UserId`),
    ADD UNIQUE KEY `Username` (`Username`),
    ADD UNIQUE KEY `Email` (`Email`),
    ADD UNIQUE KEY `PhoneNumber` (`PhoneNumber`),
    ADD KEY `GroupId` (`GroupId`);
ALTER TABLE `Users_Groups`
    ADD PRIMARY KEY (`GroupId`);
ALTER TABLE `Users_Groups_Privileges`
    ADD PRIMARY KEY (`Id`),
  ADD KEY `GroupId` (`GroupId`),
  ADD KEY `PrivilegeId` (`PrivilegeId`);
ALTER TABLE `Users_Privileges`
    ADD PRIMARY KEY (`PrivilegeId`);
ALTER TABLE `Users_Profiles`
    ADD PRIMARY KEY (`UserId`);

ALTER TABLE `Users`
    MODIFY `UserId` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
ALTER TABLE `Users_Groups`
    MODIFY `GroupId` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
ALTER TABLE `Users_Groups_Privileges`
    MODIFY `Id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
ALTER TABLE `Users_Privileges`
    MODIFY `PrivilegeId` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
ALTER TABLE `Users_Profiles`
    MODIFY `UserId` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
ALTER TABLE `Users`
    ADD CONSTRAINT `Users_CONSTRAINT` FOREIGN KEY (`GroupId`) REFERENCES `Users_Groups` (`GroupId`);
ALTER TABLE `Users_Groups_Privileges`
    ADD CONSTRAINT `Users_Groups_Privileges_CONSTRAINT_1` FOREIGN KEY (`GroupId`) REFERENCES `Users_Groups` (`GroupId`),
  ADD CONSTRAINT `Users_Groups_Privileges_CONSTRAINT_2` FOREIGN KEY (`PrivilegeId`) REFERENCES `Users_Privileges` (`PrivilegeId`);
ALTER TABLE `Users_Profiles`
    ADD CONSTRAINT `Users_Profiles_CONSTRAINT` FOREIGN KEY (`UserId`) REFERENCES `Users` (`UserId`);
COMMIT;


