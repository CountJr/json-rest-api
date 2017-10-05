CREATE TABLE `users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `first_name` VARCHAR(255) NOT NULL,
  `second_name` VARCHAR(255) NOT NULL,
  `age` TINYINT(10) UNSIGNED NOT NULL,
  `sex` CHAR(1) NOT NULL
) ENGINE=InnoDB CHARSET=utf8;

INSERT INTO `users` (`email`, `password`, `first_name`, `second_name`, `age`, `sex`) VALUES
  ('blabla@gmail.com', 'foobar', 'John', 'Doe', 35, 'M'),
  ('boo@hotmail.com', 'rerda', 'Josh', 'Wang', 20, 'M'),
  ('looka@mail.cz', '123456', 'Honza', 'Straka', 23, 'M'),
  ('laila@gmail.com', 'qwerty', 'Laila', 'Doe', 35, 'F');

