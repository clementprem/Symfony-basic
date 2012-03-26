CREATE TABLE article (id BIGINT AUTO_INCREMENT, title VARCHAR(255) NOT NULL, content LONGTEXT, status VARCHAR(255), author_id BIGINT, category_id BIGINT, published_at DATETIME, file VARCHAR(255), slug VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX article_sluggable_idx (slug), INDEX author_id_idx (author_id), INDEX category_id_idx (category_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE article_tag (article_id BIGINT, tag_id BIGINT, PRIMARY KEY(article_id, tag_id)) ENGINE = INNODB;
CREATE TABLE author (id BIGINT AUTO_INCREMENT, first_name VARCHAR(20), last_name VARCHAR(20), email VARCHAR(255), active TINYINT(1), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE category (id BIGINT AUTO_INCREMENT, name VARCHAR(255), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE tag (id BIGINT AUTO_INCREMENT, name VARCHAR(255), PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE article ADD CONSTRAINT article_category_id_category_id FOREIGN KEY (category_id) REFERENCES category(id);
ALTER TABLE article ADD CONSTRAINT article_author_id_author_id FOREIGN KEY (author_id) REFERENCES author(id);
ALTER TABLE article_tag ADD CONSTRAINT article_tag_tag_id_tag_id FOREIGN KEY (tag_id) REFERENCES tag(id) ON DELETE CASCADE;
ALTER TABLE article_tag ADD CONSTRAINT article_tag_article_id_article_id FOREIGN KEY (article_id) REFERENCES article(id) ON DELETE CASCADE;
