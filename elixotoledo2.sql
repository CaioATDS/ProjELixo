--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: categorias; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE categorias (
    categoria_id integer NOT NULL,
    categorias_descricao character varying(255) NOT NULL
);


ALTER TABLE categorias OWNER TO postgres;

--
-- Name: categorias_categoria_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE categorias_categoria_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE categorias_categoria_id_seq OWNER TO postgres;

--
-- Name: categorias_categoria_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE categorias_categoria_id_seq OWNED BY categorias.categoria_id;


--
-- Name: coletas; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE coletas (
    id integer NOT NULL,
    user_codigo integer,
    empresa_codigo integer,
    created_at timestamp(0) without time zone NOT NULL,
    updated_at timestamp(0) without time zone NOT NULL
);


ALTER TABLE coletas OWNER TO postgres;

--
-- Name: coletas_coleta_codigo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE coletas_coleta_codigo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE coletas_coleta_codigo_seq OWNER TO postgres;

--
-- Name: coletas_coleta_codigo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE coletas_coleta_codigo_seq OWNED BY coletas.id;


--
-- Name: coordenadas; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE coordenadas (
    coordenada_id integer NOT NULL,
    coordenada_latitude numeric(18,4) NOT NULL,
    coordenada_longitude numeric(18,4) NOT NULL,
    user_id integer NOT NULL,
    coordenada_data timestamp(0) without time zone NOT NULL
);


ALTER TABLE coordenadas OWNER TO postgres;

--
-- Name: coordenadas_coordenada_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE coordenadas_coordenada_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE coordenadas_coordenada_id_seq OWNER TO postgres;

--
-- Name: coordenadas_coordenada_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE coordenadas_coordenada_id_seq OWNED BY coordenadas.coordenada_id;


--
-- Name: empresas; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE empresas (
    empresa_codigo integer NOT NULL,
    empresa_nome character varying(255) NOT NULL,
    empresa_inicio timestamp(0) without time zone NOT NULL,
    empresa_fim timestamp(0) without time zone NOT NULL,
    empresa_cnpj character varying(255) NOT NULL
);


ALTER TABLE empresas OWNER TO postgres;

--
-- Name: empresas_empresa_codigo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE empresas_empresa_codigo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE empresas_empresa_codigo_seq OWNER TO postgres;

--
-- Name: empresas_empresa_codigo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE empresas_empresa_codigo_seq OWNED BY empresas.empresa_codigo;


--
-- Name: itens; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE itens (
    id integer NOT NULL,
    item_quantidade integer NOT NULL,
    modelos_id integer NOT NULL,
    coordenada_id integer,
    item_status integer DEFAULT 0,
    item_userid integer NOT NULL,
    item_colected integer DEFAULT 0,
    updated_at timestamp without time zone,
    created_at timestamp without time zone
);


ALTER TABLE itens OWNER TO postgres;

--
-- Name: itens_item_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE itens_item_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE itens_item_id_seq OWNER TO postgres;

--
-- Name: itens_item_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE itens_item_id_seq OWNED BY itens.id;


--
-- Name: itenslocal; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE itenslocal (
    itenslocal_id integer NOT NULL,
    itenslocal_quantidade integer NOT NULL,
    modelos_id integer NOT NULL,
    coordenada_id integer NOT NULL
);


ALTER TABLE itenslocal OWNER TO postgres;

--
-- Name: itenslocal_itenslocal_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE itenslocal_itenslocal_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE itenslocal_itenslocal_id_seq OWNER TO postgres;

--
-- Name: itenslocal_itenslocal_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE itenslocal_itenslocal_id_seq OWNED BY itenslocal.itenslocal_id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE migrations (
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE migrations OWNER TO postgres;

--
-- Name: modelos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE modelos (
    modelo_id integer NOT NULL,
    modelo_descricao character varying(255) NOT NULL,
    modelo_peso integer NOT NULL,
    categoria_id integer NOT NULL
);


ALTER TABLE modelos OWNER TO postgres;

--
-- Name: modelos_modelo_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE modelos_modelo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE modelos_modelo_id_seq OWNER TO postgres;

--
-- Name: modelos_modelo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE modelos_modelo_id_seq OWNED BY modelos.modelo_id;


--
-- Name: password_resets; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone NOT NULL
);


ALTER TABLE password_resets OWNER TO postgres;

--
-- Name: recolhidos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE recolhidos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE recolhidos_id_seq OWNER TO postgres;

--
-- Name: recolhidos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE recolhidos (
    id integer DEFAULT nextval('recolhidos_id_seq'::regclass) NOT NULL,
    item_quantidade integer NOT NULL,
    modelos_id integer NOT NULL,
    item_userid integer NOT NULL,
    updated_at timestamp without time zone,
    created_at timestamp without time zone,
    coleta_codigo integer
);


ALTER TABLE recolhidos OWNER TO postgres;

--
-- Name: roles; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE roles (
    id integer NOT NULL,
    name character varying(200)
);


ALTER TABLE roles OWNER TO postgres;

--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE users (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    lastname character varying(255),
    email character varying(255) NOT NULL,
    password character varying(60) NOT NULL,
    facebook_id integer,
    remember_token character varying(100),
    created_at timestamp(0) without time zone NOT NULL,
    updated_at timestamp(0) without time zone NOT NULL,
    user_roles integer DEFAULT 1 NOT NULL
);


ALTER TABLE users OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE users_id_seq OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- Name: categoria_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY categorias ALTER COLUMN categoria_id SET DEFAULT nextval('categorias_categoria_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY coletas ALTER COLUMN id SET DEFAULT nextval('coletas_coleta_codigo_seq'::regclass);


--
-- Name: coordenada_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY coordenadas ALTER COLUMN coordenada_id SET DEFAULT nextval('coordenadas_coordenada_id_seq'::regclass);


--
-- Name: empresa_codigo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY empresas ALTER COLUMN empresa_codigo SET DEFAULT nextval('empresas_empresa_codigo_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY itens ALTER COLUMN id SET DEFAULT nextval('itens_item_id_seq'::regclass);


--
-- Name: itenslocal_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY itenslocal ALTER COLUMN itenslocal_id SET DEFAULT nextval('itenslocal_itenslocal_id_seq'::regclass);


--
-- Name: modelo_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY modelos ALTER COLUMN modelo_id SET DEFAULT nextval('modelos_modelo_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Data for Name: categorias; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY categorias (categoria_id, categorias_descricao) FROM stdin;
1	Televisores
3	Monitores
8	Diversos
7	Celulares & Tablets
2	Computadores & Notebooks
4	Impressoras & Copiadora
5	Baterias, Pilhas e Nobreaks
6	Cabos & Fios
9	Eletro Doméstico
10	Equipamentos De Informática
\.


--
-- Name: categorias_categoria_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('categorias_categoria_id_seq', 6, true);


--
-- Data for Name: coletas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY coletas (id, user_codigo, empresa_codigo, created_at, updated_at) FROM stdin;
2	\N	\N	2015-07-28 20:08:03	2015-07-28 20:08:03
3	1	666	2015-07-28 20:09:46	2015-07-28 20:09:46
4	1	666	2015-07-28 20:10:23	2015-07-28 20:10:23
5	1	666	2015-07-28 21:27:12	2015-07-28 21:27:12
6	1	666	2015-07-28 21:27:20	2015-07-28 21:27:20
7	1	666	2015-07-28 21:34:13	2015-07-28 21:34:13
8	1	666	2015-07-28 23:00:27	2015-07-28 23:00:27
9	1	666	2015-07-28 23:08:56	2015-07-28 23:08:56
10	1	666	2015-07-28 23:09:59	2015-07-28 23:09:59
11	1	666	2015-07-28 23:14:26	2015-07-28 23:14:26
12	1	666	2015-07-28 23:16:20	2015-07-28 23:16:20
13	1	666	2015-07-28 23:17:53	2015-07-28 23:17:53
14	1	666	2015-07-29 21:45:04	2015-07-29 21:45:04
\.


--
-- Name: coletas_coleta_codigo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('coletas_coleta_codigo_seq', 14, true);


--
-- Data for Name: coordenadas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY coordenadas (coordenada_id, coordenada_latitude, coordenada_longitude, user_id, coordenada_data) FROM stdin;
\.


--
-- Name: coordenadas_coordenada_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('coordenadas_coordenada_id_seq', 1, false);


--
-- Data for Name: empresas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY empresas (empresa_codigo, empresa_nome, empresa_inicio, empresa_fim, empresa_cnpj) FROM stdin;
\.


--
-- Name: empresas_empresa_codigo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('empresas_empresa_codigo_seq', 1, false);


--
-- Data for Name: itens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY itens (id, item_quantidade, modelos_id, coordenada_id, item_status, item_userid, item_colected, updated_at, created_at) FROM stdin;
68	1	56	\N	1	1	1	2015-07-28 23:18:44	2015-07-27 09:33:24
67	2	57	\N	1	1	1	2015-07-28 23:18:44	2015-07-27 09:33:24
69	2	24	\N	1	1	1	2015-07-29 21:45:04	2015-07-28 23:19:51
74	2	24	\N	1	1	1	2015-07-29 21:45:04	2015-07-29 21:44:14
70	2	25	\N	1	1	1	2015-07-29 21:45:04	2015-07-28 23:19:51
71	1	26	\N	1	1	1	2015-07-29 21:45:04	2015-07-28 23:19:51
72	1	27	\N	1	1	1	2015-07-29 21:45:04	2015-07-28 23:19:51
75	1	29	\N	1	1	1	2015-07-29 21:45:04	2015-07-29 21:44:19
73	1	46	\N	1	1	1	2015-07-29 21:45:04	2015-07-29 21:44:09
76	1	60	\N	1	1	1	2015-07-29 21:45:04	2015-07-29 21:44:31
77	1	24	\N	1	1	0	2015-07-30 06:40:11	2015-07-30 06:39:01
78	3	25	\N	1	1	0	2015-07-30 06:40:11	2015-07-30 06:39:01
80	3	50	\N	1	1	0	2015-07-30 06:40:11	2015-07-30 06:39:26
81	1	48	\N	1	1	0	2015-07-30 06:40:11	2015-07-30 06:39:26
82	5	46	\N	1	1	0	2015-07-30 07:15:05	2015-07-30 06:56:06
83	2	43	\N	1	1	0	2015-07-30 07:15:05	2015-07-30 06:56:06
40	1	17	\N	1	1	1	2015-07-28 23:00:27	2015-07-22 02:24:32
63	1	24	\N	1	1	1	2015-07-28 23:16:20	2015-07-23 19:37:51
84	2	46	\N	1	2	0	2015-07-30 22:05:21	2015-07-30 22:05:11
85	1	43	\N	1	2	0	2015-07-30 22:05:21	2015-07-30 22:05:11
66	1	24	\N	1	1	1	2015-07-28 23:16:20	2015-07-27 04:27:05
59	1	28	\N	1	1	1	2015-07-28 23:17:53	2015-07-22 05:25:37
60	2	29	\N	1	1	1	2015-07-28 23:17:53	2015-07-22 05:25:37
61	1	30	\N	1	1	1	2015-07-28 23:17:53	2015-07-23 19:27:37
62	1	31	\N	1	1	1	2015-07-28 23:17:53	2015-07-23 19:27:37
47	2	42	\N	1	1	1	2015-07-28 23:17:53	2015-07-22 02:42:00
52	2	42	\N	1	1	1	2015-07-28 23:17:53	2015-07-22 02:43:07
57	1	42	\N	1	1	1	2015-07-28 23:17:53	2015-07-22 02:49:48
44	2	43	\N	1	1	1	2015-07-28 23:17:53	2015-07-22 02:42:00
54	2	43	\N	1	1	1	2015-07-28 23:17:53	2015-07-22 02:49:48
41	2	43	\N	1	1	1	2015-07-28 23:17:53	2015-07-22 02:41:29
46	2	44	\N	1	1	1	2015-07-28 23:17:53	2015-07-22 02:42:00
51	2	44	\N	1	1	1	2015-07-28 23:17:53	2015-07-22 02:43:07
56	2	44	\N	1	1	1	2015-07-28 23:17:53	2015-07-22 02:49:48
45	2	45	\N	1	1	1	2015-07-28 23:17:53	2015-07-22 02:42:00
50	2	45	\N	1	1	1	2015-07-28 23:17:53	2015-07-22 02:43:07
55	2	45	\N	1	1	1	2015-07-28 23:17:53	2015-07-22 02:49:48
42	2	45	\N	1	1	1	2015-07-28 23:17:53	2015-07-22 02:41:29
53	2	46	\N	1	1	1	2015-07-28 23:17:53	2015-07-22 02:49:48
37	1	46	\N	1	1	1	2015-07-28 23:17:53	2015-07-21 21:54:40
39	1	46	\N	1	1	1	2015-07-28 23:17:53	2015-07-21 22:59:55
36	1	53	\N	1	1	1	2015-07-28 23:17:53	2015-07-21 21:52:51
35	1	56	\N	1	1	1	2015-07-28 23:17:53	2015-07-21 21:52:51
58	1	57	\N	1	1	1	2015-07-28 23:17:53	2015-07-22 04:20:31
34	3	57	\N	1	1	1	2015-07-28 23:17:53	2015-07-21 21:52:51
\.


--
-- Name: itens_item_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('itens_item_id_seq', 86, true);


--
-- Data for Name: itenslocal; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY itenslocal (itenslocal_id, itenslocal_quantidade, modelos_id, coordenada_id) FROM stdin;
\.


--
-- Name: itenslocal_itenslocal_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('itenslocal_itenslocal_id_seq', 1, false);


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY migrations (migration, batch) FROM stdin;
2014_10_12_000000_create_users_table	1
2014_10_12_100000_create_password_resets_table	1
2015_07_10_230640_Coletas	1
2015_07_10_230709_Empresas	1
2015_07_10_230723_Coordenadas	1
2015_07_10_230744_ItensLocal	1
2015_07_10_230800_Itens	1
2015_07_10_230810_Modelos	1
2015_07_10_230820_Categorias	1
\.


--
-- Data for Name: modelos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY modelos (modelo_id, modelo_descricao, modelo_peso, categoria_id) FROM stdin;
1	TV CRT 14"	15	1
2	TV CRT 20"	20	1
3	TV CRT 29"	30	1
4	TV CRT 28"	30	1
5	TV CRT 32"	35	1
6	TV CRT 50"	50	1
8	TV LCD/LED 20"	6	1
10	TV LCD/LED 50"	20	1
7	TV LCD/LED 42"	16	1
9	TV LCD/LED 32"	10	1
11	Monitor CRT 14"	15	3
12	Monitor CRT 17"	18	3
13	Monitor CRT 19"	20	3
14	Monitor CRT 21"	22	3
15	Monitor CRT 24"	25	3
16	Monitor LCD/LED 15"	3	3
17	Monitor LCD/LED 17"	3	3
18	Monitor LCD/LED 21"	4	3
19	Monitor LCD/LED 23"	5	3
20	Monitor LCD/LED 25"	6	3
21	Monitor LCD/LED 32"	10	3
22	Monitor LCD/LED 42"	15	3
23	Monitor LCD/LED 50"	20	3
24	Cabo de Rede	1	6
25	Cabo TV	1	6
26	Fio Cobre	1	6
27	Fio Telefone	1	6
28	Celular	1	7
29	Tablet	1	7
30	Computador	5	2
31	Notebook	2	2
35	Impressora Matricial Pequena	3	4
36	Impressora Matricial Média	8	4
37	Impressora Matricial Grande	15	4
32	Impressora Tonner Pequena	3	4
34	Impressora Tonner Grande	20	4
33	Impressora Tonner Média	8	4
38	Impressora Tinta Pequena	2	4
39	Impressora Tinta Média	4	4
40	Impressora Tinta Grande\n	8	4
42	Pilhas	1	5
45	Bateria Nobreak	1	5
43	Bateria Celular	1	5
46	Bateria Automóveis	30	5
44	Bateria Notebook	15	5
48	Lampada	1	8
49	Radiografia	1	8
50	Fitas K7/VHS	1	8
52	Video Cassete	1	9
51	Radio	1	9
53	Ferro Passar	2	9
54	Máquina de Lavar/Tanquinho	40	9
55	Ventilador	4	9
47	Telefone	1	9
56	Chuveiro	1	9
57	Ar Condicionado	50	9
41	Mouse	1	10
58	Teclado	1	10
59	Caixinha de Som	1	10
60	Roteador/Modem	1	10
61	Placas	1	10
62	Web Cam	1	10
63	Hd	1	10
64	Memórias	1	10
\.


--
-- Name: modelos_modelo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('modelos_modelo_id_seq', 64, true);


--
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY password_resets (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: recolhidos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY recolhidos (id, item_quantidade, modelos_id, item_userid, updated_at, created_at, coleta_codigo) FROM stdin;
15	1	1	1	2015-07-28 15:54:19.795	2015-07-28 15:54:14.401	1
16	1	17	1	2015-07-28 20:00:15	2015-07-28 20:00:15	\N
17	1	17	1	2015-07-28 20:01:01	2015-07-28 20:01:01	\N
18	1	17	1	2015-07-28 20:02:31	2015-07-28 20:02:31	\N
19	2	24	1	2015-07-28 20:02:31	2015-07-28 20:02:31	\N
20	1	28	1	2015-07-28 20:02:31	2015-07-28 20:02:31	\N
21	2	29	1	2015-07-28 20:02:31	2015-07-28 20:02:31	\N
22	1	30	1	2015-07-28 20:02:31	2015-07-28 20:02:31	\N
23	1	31	1	2015-07-28 20:02:31	2015-07-28 20:02:31	\N
24	5	42	1	2015-07-28 20:02:31	2015-07-28 20:02:31	\N
25	6	43	1	2015-07-28 20:02:31	2015-07-28 20:02:31	\N
26	6	44	1	2015-07-28 20:02:31	2015-07-28 20:02:31	\N
27	8	45	1	2015-07-28 20:02:31	2015-07-28 20:02:31	\N
28	4	46	1	2015-07-28 20:02:31	2015-07-28 20:02:31	\N
29	1	53	1	2015-07-28 20:02:32	2015-07-28 20:02:32	\N
30	1	56	1	2015-07-28 20:02:32	2015-07-28 20:02:32	\N
31	4	57	1	2015-07-28 20:02:32	2015-07-28 20:02:32	\N
32	1	17	1	2015-07-28 20:03:57	2015-07-28 20:03:57	\N
33	2	24	1	2015-07-28 20:03:57	2015-07-28 20:03:57	\N
34	1	28	1	2015-07-28 20:03:57	2015-07-28 20:03:57	\N
35	2	29	1	2015-07-28 20:03:57	2015-07-28 20:03:57	\N
36	1	30	1	2015-07-28 20:03:57	2015-07-28 20:03:57	\N
37	1	31	1	2015-07-28 20:03:57	2015-07-28 20:03:57	\N
38	5	42	1	2015-07-28 20:03:57	2015-07-28 20:03:57	\N
39	6	43	1	2015-07-28 20:03:57	2015-07-28 20:03:57	\N
40	6	44	1	2015-07-28 20:03:57	2015-07-28 20:03:57	\N
41	8	45	1	2015-07-28 20:03:57	2015-07-28 20:03:57	\N
42	4	46	1	2015-07-28 20:03:57	2015-07-28 20:03:57	\N
43	1	53	1	2015-07-28 20:03:57	2015-07-28 20:03:57	\N
44	1	56	1	2015-07-28 20:03:57	2015-07-28 20:03:57	\N
45	4	57	1	2015-07-28 20:03:57	2015-07-28 20:03:57	\N
46	1	17	1	2015-07-28 20:04:41	2015-07-28 20:04:41	\N
47	2	24	1	2015-07-28 20:04:42	2015-07-28 20:04:42	\N
48	1	28	1	2015-07-28 20:04:42	2015-07-28 20:04:42	\N
49	2	29	1	2015-07-28 20:04:42	2015-07-28 20:04:42	\N
50	1	30	1	2015-07-28 20:04:42	2015-07-28 20:04:42	\N
51	1	31	1	2015-07-28 20:04:42	2015-07-28 20:04:42	\N
52	5	42	1	2015-07-28 20:04:42	2015-07-28 20:04:42	\N
53	6	43	1	2015-07-28 20:04:42	2015-07-28 20:04:42	\N
54	6	44	1	2015-07-28 20:04:42	2015-07-28 20:04:42	\N
55	8	45	1	2015-07-28 20:04:42	2015-07-28 20:04:42	\N
56	4	46	1	2015-07-28 20:04:42	2015-07-28 20:04:42	\N
57	1	53	1	2015-07-28 20:04:42	2015-07-28 20:04:42	\N
58	1	56	1	2015-07-28 20:04:42	2015-07-28 20:04:42	\N
59	4	57	1	2015-07-28 20:04:42	2015-07-28 20:04:42	\N
60	1	17	1	2015-07-28 20:05:03	2015-07-28 20:05:03	\N
61	2	24	1	2015-07-28 20:05:03	2015-07-28 20:05:03	\N
62	1	28	1	2015-07-28 20:05:03	2015-07-28 20:05:03	\N
63	2	29	1	2015-07-28 20:05:03	2015-07-28 20:05:03	\N
64	1	30	1	2015-07-28 20:05:03	2015-07-28 20:05:03	\N
65	1	31	1	2015-07-28 20:05:03	2015-07-28 20:05:03	\N
66	5	42	1	2015-07-28 20:05:03	2015-07-28 20:05:03	\N
67	6	43	1	2015-07-28 20:05:03	2015-07-28 20:05:03	\N
68	6	44	1	2015-07-28 20:05:04	2015-07-28 20:05:04	\N
69	8	45	1	2015-07-28 20:05:04	2015-07-28 20:05:04	\N
70	4	46	1	2015-07-28 20:05:04	2015-07-28 20:05:04	\N
71	1	53	1	2015-07-28 20:05:04	2015-07-28 20:05:04	\N
72	1	56	1	2015-07-28 20:05:04	2015-07-28 20:05:04	\N
73	4	57	1	2015-07-28 20:05:04	2015-07-28 20:05:04	\N
74	1	17	1	2015-07-28 20:06:30	2015-07-28 20:06:30	\N
75	2	24	1	2015-07-28 20:06:30	2015-07-28 20:06:30	\N
76	1	28	1	2015-07-28 20:06:30	2015-07-28 20:06:30	\N
77	2	29	1	2015-07-28 20:06:30	2015-07-28 20:06:30	\N
78	1	30	1	2015-07-28 20:06:30	2015-07-28 20:06:30	\N
79	1	31	1	2015-07-28 20:06:30	2015-07-28 20:06:30	\N
80	5	42	1	2015-07-28 20:06:30	2015-07-28 20:06:30	\N
81	6	43	1	2015-07-28 20:06:30	2015-07-28 20:06:30	\N
82	6	44	1	2015-07-28 20:06:30	2015-07-28 20:06:30	\N
83	8	45	1	2015-07-28 20:06:30	2015-07-28 20:06:30	\N
84	4	46	1	2015-07-28 20:06:30	2015-07-28 20:06:30	\N
85	1	53	1	2015-07-28 20:06:30	2015-07-28 20:06:30	\N
86	1	56	1	2015-07-28 20:06:30	2015-07-28 20:06:30	\N
87	4	57	1	2015-07-28 20:06:30	2015-07-28 20:06:30	\N
88	1	17	1	2015-07-28 20:08:03	2015-07-28 20:08:03	\N
89	2	24	1	2015-07-28 20:08:03	2015-07-28 20:08:03	\N
90	1	28	1	2015-07-28 20:08:03	2015-07-28 20:08:03	\N
91	2	29	1	2015-07-28 20:08:03	2015-07-28 20:08:03	\N
92	1	30	1	2015-07-28 20:08:03	2015-07-28 20:08:03	\N
93	1	31	1	2015-07-28 20:08:03	2015-07-28 20:08:03	\N
94	5	42	1	2015-07-28 20:08:03	2015-07-28 20:08:03	\N
95	6	43	1	2015-07-28 20:08:03	2015-07-28 20:08:03	\N
96	6	44	1	2015-07-28 20:08:03	2015-07-28 20:08:03	\N
97	8	45	1	2015-07-28 20:08:03	2015-07-28 20:08:03	\N
98	4	46	1	2015-07-28 20:08:03	2015-07-28 20:08:03	\N
99	1	53	1	2015-07-28 20:08:03	2015-07-28 20:08:03	\N
100	1	56	1	2015-07-28 20:08:03	2015-07-28 20:08:03	\N
101	4	57	1	2015-07-28 20:08:03	2015-07-28 20:08:03	\N
102	1	17	1	2015-07-28 20:09:45	2015-07-28 20:09:45	\N
103	2	24	1	2015-07-28 20:09:45	2015-07-28 20:09:45	\N
104	1	28	1	2015-07-28 20:09:46	2015-07-28 20:09:46	\N
105	2	29	1	2015-07-28 20:09:46	2015-07-28 20:09:46	\N
106	1	30	1	2015-07-28 20:09:46	2015-07-28 20:09:46	\N
107	1	31	1	2015-07-28 20:09:46	2015-07-28 20:09:46	\N
108	5	42	1	2015-07-28 20:09:46	2015-07-28 20:09:46	\N
109	6	43	1	2015-07-28 20:09:46	2015-07-28 20:09:46	\N
110	6	44	1	2015-07-28 20:09:46	2015-07-28 20:09:46	\N
111	8	45	1	2015-07-28 20:09:46	2015-07-28 20:09:46	\N
112	4	46	1	2015-07-28 20:09:46	2015-07-28 20:09:46	\N
113	1	53	1	2015-07-28 20:09:46	2015-07-28 20:09:46	\N
114	1	56	1	2015-07-28 20:09:46	2015-07-28 20:09:46	\N
115	4	57	1	2015-07-28 20:09:46	2015-07-28 20:09:46	\N
116	1	17	1	2015-07-28 20:10:23	2015-07-28 20:10:23	\N
117	2	24	1	2015-07-28 20:10:23	2015-07-28 20:10:23	\N
118	1	28	1	2015-07-28 20:10:23	2015-07-28 20:10:23	\N
119	2	29	1	2015-07-28 20:10:23	2015-07-28 20:10:23	\N
120	1	30	1	2015-07-28 20:10:23	2015-07-28 20:10:23	\N
121	1	31	1	2015-07-28 20:10:23	2015-07-28 20:10:23	\N
122	5	42	1	2015-07-28 20:10:23	2015-07-28 20:10:23	\N
123	6	43	1	2015-07-28 20:10:23	2015-07-28 20:10:23	\N
124	6	44	1	2015-07-28 20:10:23	2015-07-28 20:10:23	\N
125	8	45	1	2015-07-28 20:10:23	2015-07-28 20:10:23	\N
126	4	46	1	2015-07-28 20:10:23	2015-07-28 20:10:23	\N
127	1	53	1	2015-07-28 20:10:23	2015-07-28 20:10:23	\N
128	1	56	1	2015-07-28 20:10:23	2015-07-28 20:10:23	\N
129	4	57	1	2015-07-28 20:10:23	2015-07-28 20:10:23	\N
130	1	17	1	2015-07-28 21:34:13	2015-07-28 21:34:13	7
131	2	24	1	2015-07-28 21:34:13	2015-07-28 21:34:13	7
132	1	28	1	2015-07-28 21:34:13	2015-07-28 21:34:13	7
133	2	29	1	2015-07-28 21:34:13	2015-07-28 21:34:13	7
134	1	30	1	2015-07-28 21:34:13	2015-07-28 21:34:13	7
135	1	31	1	2015-07-28 21:34:13	2015-07-28 21:34:13	7
136	5	42	1	2015-07-28 21:34:13	2015-07-28 21:34:13	7
137	6	43	1	2015-07-28 21:34:13	2015-07-28 21:34:13	7
138	6	44	1	2015-07-28 21:34:13	2015-07-28 21:34:13	7
139	8	45	1	2015-07-28 21:34:13	2015-07-28 21:34:13	7
140	4	46	1	2015-07-28 21:34:13	2015-07-28 21:34:13	7
141	1	53	1	2015-07-28 21:34:13	2015-07-28 21:34:13	7
142	1	56	1	2015-07-28 21:34:13	2015-07-28 21:34:13	7
143	4	57	1	2015-07-28 21:34:13	2015-07-28 21:34:13	7
144	1	17	1	2015-07-28 23:00:27	2015-07-28 23:00:27	8
145	1	17	1	2015-07-28 23:08:57	2015-07-28 23:08:57	9
146	1	17	1	2015-07-28 23:09:59	2015-07-28 23:09:59	10
147	1	17	1	2015-07-28 23:16:20	2015-07-28 23:16:20	12
148	2	24	1	2015-07-28 23:16:20	2015-07-28 23:16:20	12
149	1	28	1	2015-07-28 23:16:20	2015-07-28 23:16:20	12
150	2	29	1	2015-07-28 23:16:20	2015-07-28 23:16:20	12
151	1	30	1	2015-07-28 23:16:20	2015-07-28 23:16:20	12
152	1	31	1	2015-07-28 23:16:20	2015-07-28 23:16:20	12
153	5	42	1	2015-07-28 23:16:20	2015-07-28 23:16:20	12
154	6	43	1	2015-07-28 23:16:20	2015-07-28 23:16:20	12
155	6	44	1	2015-07-28 23:16:20	2015-07-28 23:16:20	12
156	8	45	1	2015-07-28 23:16:20	2015-07-28 23:16:20	12
157	4	46	1	2015-07-28 23:16:20	2015-07-28 23:16:20	12
158	1	53	1	2015-07-28 23:16:20	2015-07-28 23:16:20	12
159	1	56	1	2015-07-28 23:16:20	2015-07-28 23:16:20	12
160	4	57	1	2015-07-28 23:16:20	2015-07-28 23:16:20	12
161	1	28	1	2015-07-28 23:17:53	2015-07-28 23:17:53	13
162	2	29	1	2015-07-28 23:17:53	2015-07-28 23:17:53	13
163	1	30	1	2015-07-28 23:17:53	2015-07-28 23:17:53	13
164	1	31	1	2015-07-28 23:17:53	2015-07-28 23:17:53	13
165	5	42	1	2015-07-28 23:17:53	2015-07-28 23:17:53	13
166	6	43	1	2015-07-28 23:17:53	2015-07-28 23:17:53	13
167	6	44	1	2015-07-28 23:17:53	2015-07-28 23:17:53	13
168	8	45	1	2015-07-28 23:17:53	2015-07-28 23:17:53	13
169	4	46	1	2015-07-28 23:17:53	2015-07-28 23:17:53	13
170	1	53	1	2015-07-28 23:17:53	2015-07-28 23:17:53	13
171	1	56	1	2015-07-28 23:17:53	2015-07-28 23:17:53	13
172	4	57	1	2015-07-28 23:17:53	2015-07-28 23:17:53	13
173	4	24	1	2015-07-29 21:45:04	2015-07-29 21:45:04	14
174	2	25	1	2015-07-29 21:45:04	2015-07-29 21:45:04	14
175	1	26	1	2015-07-29 21:45:04	2015-07-29 21:45:04	14
176	1	27	1	2015-07-29 21:45:04	2015-07-29 21:45:04	14
177	1	29	1	2015-07-29 21:45:04	2015-07-29 21:45:04	14
178	1	46	1	2015-07-29 21:45:04	2015-07-29 21:45:04	14
179	1	60	1	2015-07-29 21:45:04	2015-07-29 21:45:04	14
\.


--
-- Name: recolhidos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('recolhidos_id_seq', 179, true);


--
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY roles (id, name) FROM stdin;
3	Empresa
1	Usuário
2	Aluno
4	Admin
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY users (id, name, lastname, email, password, facebook_id, remember_token, created_at, updated_at, user_roles) FROM stdin;
1	Rodrigo	Brandão	knoonrx@live.com	$2y$10$8SuNOcGYP/.PAWUmPtXGPufOboMulRntEbKQwexbbJQVdhybU09tO	\N	ToWi9fzrDbEZqrKecBz5vAwHEXuB3PqVYisTrwi5S4sVRjhtYnDEmMTYlonH	2015-07-16 04:25:19	2015-07-30 22:04:28	2
2	Afonso	\N	k-noon@hotmail.com	$2y$10$THdganKHmscUYJRTnGMTReWVBVjciJQcLyCDRcuSUWNktEFb7JcB.	\N	pH8wZ4NxUxCd0nOZErdHNutbaRNRflWsXqRCdfIFlJBWZfSuanGj8rPxjrIz	2015-07-30 21:59:36	2015-07-30 22:22:14	1
\.


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_id_seq', 2, true);


--
-- Name: categorias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY categorias
    ADD CONSTRAINT categorias_pkey PRIMARY KEY (categoria_id);


--
-- Name: coletas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY coletas
    ADD CONSTRAINT coletas_pkey PRIMARY KEY (id);


--
-- Name: coordenadas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY coordenadas
    ADD CONSTRAINT coordenadas_pkey PRIMARY KEY (coordenada_id);


--
-- Name: empresas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY empresas
    ADD CONSTRAINT empresas_pkey PRIMARY KEY (empresa_codigo);


--
-- Name: itens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY itens
    ADD CONSTRAINT itens_pkey PRIMARY KEY (id);


--
-- Name: itenslocal_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY itenslocal
    ADD CONSTRAINT itenslocal_pkey PRIMARY KEY (itenslocal_id);


--
-- Name: modelos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY modelos
    ADD CONSTRAINT modelos_pkey PRIMARY KEY (modelo_id);


--
-- Name: recolhidos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY recolhidos
    ADD CONSTRAINT recolhidos_pkey PRIMARY KEY (id);


--
-- Name: unique_id; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY roles
    ADD CONSTRAINT unique_id UNIQUE (id);


--
-- Name: users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX password_resets_email_index ON password_resets USING btree (email);


--
-- Name: password_resets_token_index; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX password_resets_token_index ON password_resets USING btree (token);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

