--
-- Base de données: `symblog`
--

-- --------------------------------------------------------

CREATE DATABASE if NOT EXISTS `symblog`;

USE symblog;

--
-- Structure de la table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `blog` longtext NOT NULL,
  `image` varchar(20) NOT NULL,
  `tags` longtext NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `blog`
--

INSERT INTO `blog` (`id`, `title`, `slug`, `author`, `blog`, `image`, `tags`, `created`, `updated`) VALUES
(1, 'A day with Symfony2', 'a-day-with-symfony2', 'dsyph3r', 'Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.', 'beach.jpg', 'symfony2, php, paradise, symblog', '2012-05-14 12:50:16', '2012-05-14 12:50:16'),
(2, 'The pool on the roof must have a leak', 'the-pool-on-the-roof-must-have-a-leak', 'Zero Cool', 'Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Na. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis.', 'pool_leak.jpg', 'pool, leaky, hacked, movie, hacking, symblog', '2012-05-14 12:50:16', '2012-05-14 12:50:16'),
(3, 'Misdirection. What the eyes see and the ears hear, the mind believes', 'misdirection-what-the-eyes-see-and-the-ears-hear-the-mind-believes', 'Gabriel', 'Lorem ipsumvehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.', 'misdirection.jpg', 'misdirection, magic, movie, hacking, symblog', '2012-05-14 12:50:16', '2012-05-14 12:50:16'),
(4, 'The grid - A digital frontier', 'the-grid-a-digital-frontier', 'Kevin Flynn', 'Lorem commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra.', 'the_grid.jpg', 'grid, daftpunk, movie, symblog', '2012-05-14 12:50:16', '2012-05-14 12:50:16'),
(5, 'You''re either a one or a zero. Alive or dead', 'you-re-either-a-one-or-a-zero-alive-or-dead', 'Gary Winston', 'Lorem ipsum dolor sit amet, consectetur adipiscing elittibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.', 'one_or_zero.jpg', 'binary, one, zero, alive, dead, !trusting, movie, symblog', '2012-05-14 12:50:16', '2012-05-14 12:50:16');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) DEFAULT NULL,
  `user` varchar(255) NOT NULL,
  `comment` longtext NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9474526CDAE07E97` (`blog_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id`, `blog_id`, `user`, `comment`, `approved`, `created`, `updated`) VALUES
(1, 1, 'symfony', 'To make a long story short. You can''t go wrong by choosing Symfony! And no one has ever been fired for using Symfony.', 1, '2012-05-14 12:50:16', '2012-05-14 12:50:16'),
(2, 1, 'David', 'To make a long story short. Choosing a framework must not be taken lightly; it is a long-term commitment. Make sure that you make the right selection!', 1, '2012-05-14 12:50:16', '2012-05-14 12:50:16'),
(3, 2, 'Dade', 'Anything else, mom? You want me to mow the lawn? Oops! I forgot, New York, No grass.', 1, '2012-05-14 12:50:16', '2012-05-14 12:50:16'),
(4, 2, 'Kate', 'Are you challenging me? ', 1, '2011-07-23 06:15:20', '2012-05-14 12:50:16'),
(5, 2, 'Dade', 'Name your stakes.', 1, '2011-07-23 06:18:35', '2012-05-14 12:50:16'),
(6, 2, 'Kate', 'If I win, you become my slave.', 1, '2011-07-23 06:22:53', '2012-05-14 12:50:16'),
(7, 2, 'Dade', 'Your SLAVE?', 1, '2011-07-23 06:25:15', '2012-05-14 12:50:16'),
(8, 2, 'Kate', 'You wish! You''ll do shitwork, scan, crack copyrights...', 1, '2011-07-23 06:46:08', '2012-05-14 12:50:16'),
(9, 2, 'Dade', 'And if I win?', 1, '2011-07-23 10:22:46', '2012-05-14 12:50:16'),
(10, 2, 'Kate', 'Make it my first-born!', 1, '2011-07-23 11:08:08', '2012-05-14 12:50:16'),
(11, 2, 'Dade', 'Make it our first-date!', 1, '2011-07-24 18:56:01', '2012-05-14 12:50:16'),
(12, 2, 'Kate', 'I don''t DO dates. But I don''t lose either, so you''re on!', 1, '2011-07-25 22:28:42', '2012-05-14 12:50:16'),
(13, 3, 'Stanley', 'It''s not gonna end like this.', 1, '2012-05-14 12:50:16', '2012-05-14 12:50:16'),
(14, 3, 'Gabriel', 'Oh, come on, Stan. Not everything ends the way you think it should. Besides, audiences love happy endings.', 1, '2012-05-14 12:50:16', '2012-05-14 12:50:16'),
(15, 5, 'Mile', 'Doesn''t Bill Gates have something like that?', 1, '2012-05-14 12:50:16', '2012-05-14 12:50:16'),
(16, 5, 'Gary', 'Bill Who?', 1, '2012-05-14 12:50:16', '2012-05-14 12:50:16');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526CDAE07E97` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`);

