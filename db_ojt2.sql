--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.12
-- Dumped by pg_dump version 9.6.12

-- Started on 2019-03-20 15:24:46

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 2182 (class 0 OID 16435)
-- Dependencies: 185
-- Data for Name: tb_end; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tb_end (id, assessor, acknowledge, ojt_date, eval_date, ex_date, status, remark, created_at, user_id) FROM stdin;
43	619018	618039	2019-03-18 00:00:00-07	2019-03-20 00:00:00-07	2019-05-20 00:00:00-07	PASSED	CNC LEVEL 1	2019-03-12 09:08:29-07	618036
\.


--
-- TOC entry 2201 (class 0 OID 0)
-- Dependencies: 186
-- Name: tb_end_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_end_id_seq', 43, true);


--
-- TOC entry 2184 (class 0 OID 16443)
-- Dependencies: 187
-- Data for Name: tb_eval; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tb_eval (id, quest, ojt_id, remark) FROM stdin;
4	semangat juga	1	\N
5	makan makan ingat perut	1	\N
37	semangakt kakak	1	\N
38	makan	1	\N
39	minum	1	\N
40	hati hatilah kawan kawan	1	\N
41	semangat	3	\N
44	sajdamn	1	\N
\.


--
-- TOC entry 2202 (class 0 OID 0)
-- Dependencies: 188
-- Name: tb_eval_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_eval_id_seq', 45, true);


--
-- TOC entry 2186 (class 0 OID 16451)
-- Dependencies: 189
-- Data for Name: tb_ojt; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tb_ojt (id, kode, name, due_date, remark) FROM stdin;
1	K002	CNC LEVEL 1	3	\N
3	KK004	GAUGING LEVEL 1	1	\N
5	SDFS	SASDAFDS	3	\N
6	DAD	SAD	3	\N
8	SADAD	SADAD	2	\N
11	HJSADK	KLSAJDSALK	2	\N
\.


--
-- TOC entry 2203 (class 0 OID 0)
-- Dependencies: 190
-- Name: tb_ojt_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_ojt_id_seq', 11, true);


--
-- TOC entry 2195 (class 0 OID 16531)
-- Dependencies: 198
-- Data for Name: tb_telegram; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tb_telegram (id, emp_nik, telegram_id) FROM stdin;
1	618036	384920975
3	218012	504513660
\.


--
-- TOC entry 2204 (class 0 OID 0)
-- Dependencies: 197
-- Name: tb_telegram_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_telegram_id_seq', 3, true);


--
-- TOC entry 2188 (class 0 OID 16459)
-- Dependencies: 191
-- Data for Name: tb_tmpr; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tb_tmpr (id, end_id, name_file, remark) FROM stdin;
\.


--
-- TOC entry 2205 (class 0 OID 0)
-- Dependencies: 192
-- Name: tb_tmpr_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_tmpr_id_seq', 24, true);


--
-- TOC entry 2190 (class 0 OID 16467)
-- Dependencies: 193
-- Data for Name: tb_user; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tb_user (id, nik, role, remark) FROM stdin;
1	618036	admin	' '
2	618034	champion	' '
3	618035	champion	\N
6	619018	champion	\N
41	618039	admin	\N
43	619010	champion	\N
44	56778	champion	\N
49	618039	acknowledge	\N
\.


--
-- TOC entry 2206 (class 0 OID 0)
-- Dependencies: 194
-- Name: tb_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_user_id_seq', 49, true);


--
-- TOC entry 2192 (class 0 OID 16475)
-- Dependencies: 195
-- Data for Name: tb_value; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tb_value (id, user_id, value, remark, criteria, created_at) FROM stdin;
186	618036	1		apakah anda mau minum ?	2019-03-12 09:08:29-07
187	618036	1		semangat juga	2019-03-12 09:08:29-07
188	618036	1		makan makan ingat perut	2019-03-12 09:08:29-07
189	618036	1		semangakt kakak	2019-03-12 09:08:29-07
\.


--
-- TOC entry 2207 (class 0 OID 0)
-- Dependencies: 196
-- Name: tb_value_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_value_id_seq', 189, true);


-- Completed on 2019-03-20 15:24:51

--
-- PostgreSQL database dump complete
--

