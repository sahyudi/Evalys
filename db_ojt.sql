--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.12
-- Dumped by pg_dump version 9.6.12

-- Started on 2019-03-01 01:26:56

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
-- TOC entry 1 (class 3079 OID 12387)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2179 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 185 (class 1259 OID 16435)
-- Name: tb_end; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_end (
    id integer NOT NULL,
    user_id integer,
    assessor character varying,
    acknowledge character varying,
    ojt_date timestamp with time zone,
    eval_date timestamp with time zone,
    ex_date timestamp with time zone,
    status character varying,
    remark character varying,
    created_at timestamp with time zone
);


ALTER TABLE public.tb_end OWNER TO postgres;

--
-- TOC entry 186 (class 1259 OID 16441)
-- Name: tb_end_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_end_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_end_id_seq OWNER TO postgres;

--
-- TOC entry 2180 (class 0 OID 0)
-- Dependencies: 186
-- Name: tb_end_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_end_id_seq OWNED BY public.tb_end.id;


--
-- TOC entry 187 (class 1259 OID 16443)
-- Name: tb_eval; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_eval (
    id integer NOT NULL,
    quest text,
    ojt_id integer,
    remark character varying
);


ALTER TABLE public.tb_eval OWNER TO postgres;

--
-- TOC entry 188 (class 1259 OID 16449)
-- Name: tb_eval_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_eval_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_eval_id_seq OWNER TO postgres;

--
-- TOC entry 2181 (class 0 OID 0)
-- Dependencies: 188
-- Name: tb_eval_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_eval_id_seq OWNED BY public.tb_eval.id;


--
-- TOC entry 189 (class 1259 OID 16451)
-- Name: tb_ojt; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_ojt (
    id integer NOT NULL,
    kode character varying,
    name character varying,
    due_date character varying,
    remark character varying
);


ALTER TABLE public.tb_ojt OWNER TO postgres;

--
-- TOC entry 190 (class 1259 OID 16457)
-- Name: tb_ojt_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_ojt_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_ojt_id_seq OWNER TO postgres;

--
-- TOC entry 2182 (class 0 OID 0)
-- Dependencies: 190
-- Name: tb_ojt_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_ojt_id_seq OWNED BY public.tb_ojt.id;


--
-- TOC entry 191 (class 1259 OID 16459)
-- Name: tb_tmpr; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_tmpr (
    id integer NOT NULL,
    end_id integer,
    name_file character varying,
    remark character varying
);


ALTER TABLE public.tb_tmpr OWNER TO postgres;

--
-- TOC entry 192 (class 1259 OID 16465)
-- Name: tb_tmpr_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_tmpr_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_tmpr_id_seq OWNER TO postgres;

--
-- TOC entry 2183 (class 0 OID 0)
-- Dependencies: 192
-- Name: tb_tmpr_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_tmpr_id_seq OWNED BY public.tb_tmpr.id;


--
-- TOC entry 193 (class 1259 OID 16467)
-- Name: tb_user; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_user (
    id integer NOT NULL,
    nik character varying,
    name character varying,
    dept character varying,
    role character varying,
    remark character varying
);


ALTER TABLE public.tb_user OWNER TO postgres;

--
-- TOC entry 194 (class 1259 OID 16473)
-- Name: tb_user_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_user_id_seq OWNER TO postgres;

--
-- TOC entry 2184 (class 0 OID 0)
-- Dependencies: 194
-- Name: tb_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_user_id_seq OWNED BY public.tb_user.id;


--
-- TOC entry 195 (class 1259 OID 16475)
-- Name: tb_value; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_value (
    id integer NOT NULL,
    user_id integer,
    value character varying,
    remark character varying,
    criteria text,
    created_at timestamp with time zone
);


ALTER TABLE public.tb_value OWNER TO postgres;

--
-- TOC entry 196 (class 1259 OID 16481)
-- Name: tb_value_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_value_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_value_id_seq OWNER TO postgres;

--
-- TOC entry 2185 (class 0 OID 0)
-- Dependencies: 196
-- Name: tb_value_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_value_id_seq OWNED BY public.tb_value.id;


--
-- TOC entry 2037 (class 2604 OID 16483)
-- Name: tb_end id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_end ALTER COLUMN id SET DEFAULT nextval('public.tb_end_id_seq'::regclass);


--
-- TOC entry 2038 (class 2604 OID 16484)
-- Name: tb_eval id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_eval ALTER COLUMN id SET DEFAULT nextval('public.tb_eval_id_seq'::regclass);


--
-- TOC entry 2039 (class 2604 OID 16485)
-- Name: tb_ojt id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_ojt ALTER COLUMN id SET DEFAULT nextval('public.tb_ojt_id_seq'::regclass);


--
-- TOC entry 2040 (class 2604 OID 16486)
-- Name: tb_tmpr id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tmpr ALTER COLUMN id SET DEFAULT nextval('public.tb_tmpr_id_seq'::regclass);


--
-- TOC entry 2041 (class 2604 OID 16487)
-- Name: tb_user id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_user ALTER COLUMN id SET DEFAULT nextval('public.tb_user_id_seq'::regclass);


--
-- TOC entry 2042 (class 2604 OID 16488)
-- Name: tb_value id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_value ALTER COLUMN id SET DEFAULT nextval('public.tb_value_id_seq'::regclass);


--
-- TOC entry 2044 (class 2606 OID 16490)
-- Name: tb_end tb_end_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_end
    ADD CONSTRAINT tb_end_pkey PRIMARY KEY (id);


--
-- TOC entry 2046 (class 2606 OID 16492)
-- Name: tb_eval tb_eval_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_eval
    ADD CONSTRAINT tb_eval_pkey PRIMARY KEY (id);


--
-- TOC entry 2048 (class 2606 OID 16494)
-- Name: tb_ojt tb_ojt_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_ojt
    ADD CONSTRAINT tb_ojt_pkey PRIMARY KEY (id);


--
-- TOC entry 2050 (class 2606 OID 16496)
-- Name: tb_tmpr tb_tmpr_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tmpr
    ADD CONSTRAINT tb_tmpr_pkey PRIMARY KEY (id);


--
-- TOC entry 2052 (class 2606 OID 16498)
-- Name: tb_user tb_user_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_user
    ADD CONSTRAINT tb_user_pkey PRIMARY KEY (id);


--
-- TOC entry 2054 (class 2606 OID 16500)
-- Name: tb_value tb_value_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_value
    ADD CONSTRAINT tb_value_pkey PRIMARY KEY (id);


-- Completed on 2019-03-01 01:26:57

--
-- PostgreSQL database dump complete
--

