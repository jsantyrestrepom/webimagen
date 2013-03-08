--
-- PostgreSQL database dump
--

-- Dumped from database version 9.2.3
-- Dumped by pg_dump version 9.2.2
-- Started on 2013-03-08 08:27:19

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

DROP DATABASE webimagen;
--
-- TOC entry 1934 (class 1262 OID 24587)
-- Name: webimagen; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE webimagen WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Spanish_Spain.1252' LC_CTYPE = 'Spanish_Spain.1252';


ALTER DATABASE webimagen OWNER TO postgres;

\connect webimagen

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 5 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA public;


ALTER SCHEMA public OWNER TO postgres;

--
-- TOC entry 1935 (class 0 OID 0)
-- Dependencies: 5
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON SCHEMA public IS 'standard public schema';


--
-- TOC entry 171 (class 3079 OID 11727)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 1937 (class 0 OID 0)
-- Dependencies: 171
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

--
-- TOC entry 170 (class 1259 OID 24617)
-- Name: seq_tbl_imagen_cod; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE seq_tbl_imagen_cod
    START WITH 4
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.seq_tbl_imagen_cod OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 169 (class 1259 OID 24596)
-- Name: tbl_imagen; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tbl_imagen (
    cod_imagen integer NOT NULL,
    id_user integer NOT NULL,
    name_imagen character varying(100) NOT NULL,
    date_imagen integer NOT NULL,
    type_imagen character varying(8) NOT NULL
);


ALTER TABLE public.tbl_imagen OWNER TO postgres;

--
-- TOC entry 168 (class 1259 OID 24588)
-- Name: tbl_user; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tbl_user (
    id_user integer NOT NULL,
    username_user character varying(20) NOT NULL,
    password_user character varying NOT NULL,
    name_user character varying(40) NOT NULL,
    surname1_user character varying(40) NOT NULL,
    surname2_user character varying(40),
    birthdate_user integer
);


ALTER TABLE public.tbl_user OWNER TO postgres;

--
-- TOC entry 1938 (class 0 OID 0)
-- Dependencies: 168
-- Name: TABLE tbl_user; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE tbl_user IS 'Contiene toda la información de cada usuario que se registre';


--
-- TOC entry 1939 (class 0 OID 0)
-- Dependencies: 170
-- Name: seq_tbl_imagen_cod; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('seq_tbl_imagen_cod', 15, true);


--
-- TOC entry 1928 (class 0 OID 24596)
-- Dependencies: 169
-- Data for Name: tbl_imagen; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tbl_imagen (cod_imagen, id_user, name_imagen, date_imagen, type_imagen) VALUES (5, 4, 'img-1361414815', 1361414815, 'jpg');
INSERT INTO tbl_imagen (cod_imagen, id_user, name_imagen, date_imagen, type_imagen) VALUES (9, 4, 'img-1361730119', 1361730119, 'jpg');
INSERT INTO tbl_imagen (cod_imagen, id_user, name_imagen, date_imagen, type_imagen) VALUES (10, 4, 'img-1361730624', 1361730624, 'jpg');
INSERT INTO tbl_imagen (cod_imagen, id_user, name_imagen, date_imagen, type_imagen) VALUES (11, 4, 'img-1361736263', 1361736263, 'jpg');
INSERT INTO tbl_imagen (cod_imagen, id_user, name_imagen, date_imagen, type_imagen) VALUES (13, 1, 'img-1362747999', 1362747999, 'jpg');
INSERT INTO tbl_imagen (cod_imagen, id_user, name_imagen, date_imagen, type_imagen) VALUES (14, 4, 'img-1362748036', 1362748036, 'jpg');
INSERT INTO tbl_imagen (cod_imagen, id_user, name_imagen, date_imagen, type_imagen) VALUES (15, 4, 'img-1362748298', 1362748298, 'jpg');


--
-- TOC entry 1927 (class 0 OID 24588)
-- Dependencies: 168
-- Data for Name: tbl_user; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tbl_user (id_user, username_user, password_user, name_user, surname1_user, surname2_user, birthdate_user) VALUES (4, 'jsrm', 'aa5312312089ffaaf1dd2c19bee60bcb', 'Javier Santiago', 'Restrepo', 'Moncada', 638344800);
INSERT INTO tbl_user (id_user, username_user, password_user, name_user, surname1_user, surname2_user, birthdate_user) VALUES (1, 'telematica', '7d8c9c8b116cdfe3fb091f4c1ac684de', 'profesor', 'telematica', NULL, 1361323497);


--
-- TOC entry 1925 (class 2606 OID 24600)
-- Name: PK_tbl_imagen; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tbl_imagen
    ADD CONSTRAINT "PK_tbl_imagen" PRIMARY KEY (cod_imagen);


--
-- TOC entry 1922 (class 2606 OID 24595)
-- Name: PK_tbl_user; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tbl_user
    ADD CONSTRAINT "PK_tbl_user" PRIMARY KEY (id_user);


--
-- TOC entry 1923 (class 1259 OID 24606)
-- Name: FKI_tbl_user; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "FKI_tbl_user" ON tbl_imagen USING btree (id_user);


--
-- TOC entry 1926 (class 2606 OID 24601)
-- Name: FK_tbl_user; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tbl_imagen
    ADD CONSTRAINT "FK_tbl_user" FOREIGN KEY (id_user) REFERENCES tbl_user(id_user);


--
-- TOC entry 1936 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2013-03-08 08:27:20

--
-- PostgreSQL database dump complete
--

