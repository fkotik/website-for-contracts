--
-- PostgreSQL database dump
--

\restrict Qaz2SbyzFiO9LZFc2YaWst5tRKF4PxGoSruybUNgowJUQ0n0btK7QoWWArnLBRm

-- Dumped from database version 18.1
-- Dumped by pg_dump version 18.1

-- Started on 2026-04-22 01:34:53

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 228 (class 1259 OID 25663)
-- Name: contracts; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.contracts (
    id_contract integer CONSTRAINT contracts_id_contracts_not_null NOT NULL,
    date_of_conclusion date NOT NULL,
    fk_id_customer integer NOT NULL,
    fk_id_performer integer NOT NULL,
    fk_id_type_of_contract integer CONSTRAINT contracts_fk_id_types_of_contracts_not_null NOT NULL,
    fk_id_stage_of_execution integer CONSTRAINT contracts_fk_id_stages_of_execution_not_null NOT NULL,
    fk_id_vat_rate integer CONSTRAINT contracts_fk_id_vat_rates_not_null NOT NULL,
    date_of_execution date NOT NULL,
    theme character varying(255) NOT NULL,
    note text
);


ALTER TABLE public.contracts OWNER TO postgres;

--
-- TOC entry 227 (class 1259 OID 25662)
-- Name: contracts_id_contracts_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.contracts_id_contracts_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.contracts_id_contracts_seq OWNER TO postgres;

--
-- TOC entry 4958 (class 0 OID 0)
-- Dependencies: 227
-- Name: contracts_id_contracts_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.contracts_id_contracts_seq OWNED BY public.contracts.id_contract;


--
-- TOC entry 226 (class 1259 OID 25641)
-- Name: organizations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.organizations (
    id_organization integer CONSTRAINT organizations_id_organizations_not_null NOT NULL,
    name character varying(255) NOT NULL,
    postcode integer NOT NULL,
    address text NOT NULL,
    telephone bigint NOT NULL,
    fax_number bigint NOT NULL,
    tin bigint NOT NULL,
    correspondent_account numeric(21,0) NOT NULL,
    bank character varying(255) NOT NULL,
    payment_account numeric(21,0) NOT NULL,
    okonh integer NOT NULL,
    okpo bigint NOT NULL,
    bic bigint NOT NULL
);


ALTER TABLE public.organizations OWNER TO postgres;

--
-- TOC entry 225 (class 1259 OID 25640)
-- Name: organizations_id_organizations_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.organizations_id_organizations_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.organizations_id_organizations_seq OWNER TO postgres;

--
-- TOC entry 4959 (class 0 OID 0)
-- Dependencies: 225
-- Name: organizations_id_organizations_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.organizations_id_organizations_seq OWNED BY public.organizations.id_organization;


--
-- TOC entry 232 (class 1259 OID 25736)
-- Name: payment; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.payment (
    id_contract integer NOT NULL,
    payment_date date NOT NULL,
    payment_amount bigint NOT NULL,
    fk_id_type_of_payment integer NOT NULL,
    payment_document_number bigint NOT NULL
);


ALTER TABLE public.payment OWNER TO postgres;

--
-- TOC entry 229 (class 1259 OID 25705)
-- Name: stages_of_contracts; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.stages_of_contracts (
    id_contract integer NOT NULL,
    stage_number integer NOT NULL,
    stage_execution_date date NOT NULL,
    fk_id_stages_of_execution integer NOT NULL,
    stage_amount integer NOT NULL,
    advance_payment integer NOT NULL,
    theme character varying(255) NOT NULL
);


ALTER TABLE public.stages_of_contracts OWNER TO postgres;

--
-- TOC entry 233 (class 1259 OID 26201)
-- Name: stages_of_contracts_stage_number_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.stages_of_contracts_stage_number_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.stages_of_contracts_stage_number_seq OWNER TO postgres;

--
-- TOC entry 4960 (class 0 OID 0)
-- Dependencies: 233
-- Name: stages_of_contracts_stage_number_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.stages_of_contracts_stage_number_seq OWNED BY public.stages_of_contracts.stage_number;


--
-- TOC entry 222 (class 1259 OID 25625)
-- Name: stages_of_execution; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.stages_of_execution (
    id_stage_of_execution integer CONSTRAINT stages_of_execution_id_stages_of_execution_not_null NOT NULL,
    name character varying(255)
);


ALTER TABLE public.stages_of_execution OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 25624)
-- Name: stages_of_execution_id_stages_of_execution_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.stages_of_execution_id_stages_of_execution_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.stages_of_execution_id_stages_of_execution_seq OWNER TO postgres;

--
-- TOC entry 4961 (class 0 OID 0)
-- Dependencies: 221
-- Name: stages_of_execution_id_stages_of_execution_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.stages_of_execution_id_stages_of_execution_seq OWNED BY public.stages_of_execution.id_stage_of_execution;


--
-- TOC entry 220 (class 1259 OID 25617)
-- Name: types_of_contracts; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.types_of_contracts (
    id_type_of_contract integer CONSTRAINT types_of_contracts_id_types_of_contracts_not_null NOT NULL,
    name character varying(255)
);


ALTER TABLE public.types_of_contracts OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 25616)
-- Name: types_of_contracts_id_types_of_contracts_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.types_of_contracts_id_types_of_contracts_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.types_of_contracts_id_types_of_contracts_seq OWNER TO postgres;

--
-- TOC entry 4962 (class 0 OID 0)
-- Dependencies: 219
-- Name: types_of_contracts_id_types_of_contracts_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.types_of_contracts_id_types_of_contracts_seq OWNED BY public.types_of_contracts.id_type_of_contract;


--
-- TOC entry 231 (class 1259 OID 25728)
-- Name: types_of_payments; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.types_of_payments (
    id_type_of_payment integer NOT NULL,
    name character varying(255) NOT NULL
);


ALTER TABLE public.types_of_payments OWNER TO postgres;

--
-- TOC entry 230 (class 1259 OID 25727)
-- Name: types_of_payments_id_type_of_payment_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.types_of_payments_id_type_of_payment_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.types_of_payments_id_type_of_payment_seq OWNER TO postgres;

--
-- TOC entry 4963 (class 0 OID 0)
-- Dependencies: 230
-- Name: types_of_payments_id_type_of_payment_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.types_of_payments_id_type_of_payment_seq OWNED BY public.types_of_payments.id_type_of_payment;


--
-- TOC entry 224 (class 1259 OID 25633)
-- Name: vat_rates; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.vat_rates (
    id_vat_rate integer CONSTRAINT vat_rates_id_vat_rates_not_null NOT NULL,
    percent numeric(10,2)
);


ALTER TABLE public.vat_rates OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 25632)
-- Name: vat_rates_id_vat_rates_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.vat_rates_id_vat_rates_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.vat_rates_id_vat_rates_seq OWNER TO postgres;

--
-- TOC entry 4964 (class 0 OID 0)
-- Dependencies: 223
-- Name: vat_rates_id_vat_rates_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.vat_rates_id_vat_rates_seq OWNED BY public.vat_rates.id_vat_rate;


--
-- TOC entry 4763 (class 2604 OID 25666)
-- Name: contracts id_contract; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contracts ALTER COLUMN id_contract SET DEFAULT nextval('public.contracts_id_contracts_seq'::regclass);


--
-- TOC entry 4762 (class 2604 OID 25644)
-- Name: organizations id_organization; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.organizations ALTER COLUMN id_organization SET DEFAULT nextval('public.organizations_id_organizations_seq'::regclass);


--
-- TOC entry 4764 (class 2604 OID 26202)
-- Name: stages_of_contracts stage_number; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.stages_of_contracts ALTER COLUMN stage_number SET DEFAULT nextval('public.stages_of_contracts_stage_number_seq'::regclass);


--
-- TOC entry 4760 (class 2604 OID 25628)
-- Name: stages_of_execution id_stage_of_execution; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.stages_of_execution ALTER COLUMN id_stage_of_execution SET DEFAULT nextval('public.stages_of_execution_id_stages_of_execution_seq'::regclass);


--
-- TOC entry 4759 (class 2604 OID 25620)
-- Name: types_of_contracts id_type_of_contract; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.types_of_contracts ALTER COLUMN id_type_of_contract SET DEFAULT nextval('public.types_of_contracts_id_types_of_contracts_seq'::regclass);


--
-- TOC entry 4765 (class 2604 OID 25731)
-- Name: types_of_payments id_type_of_payment; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.types_of_payments ALTER COLUMN id_type_of_payment SET DEFAULT nextval('public.types_of_payments_id_type_of_payment_seq'::regclass);


--
-- TOC entry 4761 (class 2604 OID 25636)
-- Name: vat_rates id_vat_rate; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vat_rates ALTER COLUMN id_vat_rate SET DEFAULT nextval('public.vat_rates_id_vat_rates_seq'::regclass);


--
-- TOC entry 4947 (class 0 OID 25663)
-- Dependencies: 228
-- Data for Name: contracts; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.contracts (id_contract, date_of_conclusion, fk_id_customer, fk_id_performer, fk_id_type_of_contract, fk_id_stage_of_execution, fk_id_vat_rate, date_of_execution, theme, note) FROM stdin;
2	2026-04-20	2	3	2	1	1	2026-04-22	dwfefwe	fewfqwe
3	2026-04-16	2	2	2	1	1	2026-04-01	5165165	\N
4	2026-04-22	3	3	2	1	1	2026-04-03	3123	\N
\.


--
-- TOC entry 4945 (class 0 OID 25641)
-- Dependencies: 226
-- Data for Name: organizations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.organizations (id_organization, name, postcode, address, telephone, fax_number, tin, correspondent_account, bank, payment_account, okonh, okpo, bic) FROM stdin;
2	дядя Фёдор	1234567890	Колотушкина	12345678901	12346789012	123456890123	12345689012345678919	Буб	12345789012356890111	11111	1111111111	111111111
3	дядя Игорь	1234567890	вйцвйц	1321312321	3123213	12312312321	321312312	цвауцауц	123123	12312	12312	312312312
\.


--
-- TOC entry 4951 (class 0 OID 25736)
-- Dependencies: 232
-- Data for Name: payment; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.payment (id_contract, payment_date, payment_amount, fk_id_type_of_payment, payment_document_number) FROM stdin;
3	2026-04-22	2222222	2	3123213
\.


--
-- TOC entry 4948 (class 0 OID 25705)
-- Dependencies: 229
-- Data for Name: stages_of_contracts; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.stages_of_contracts (id_contract, stage_number, stage_execution_date, fk_id_stages_of_execution, stage_amount, advance_payment, theme) FROM stdin;
2	3	2026-04-18	1	21312	321312	312312
2	2	2026-04-23	2	234324	324134	132412
\.


--
-- TOC entry 4941 (class 0 OID 25625)
-- Dependencies: 222
-- Data for Name: stages_of_execution; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.stages_of_execution (id_stage_of_execution, name) FROM stdin;
1	Согласование
2	Определение
\.


--
-- TOC entry 4939 (class 0 OID 25617)
-- Dependencies: 220
-- Data for Name: types_of_contracts; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.types_of_contracts (id_type_of_contract, name) FROM stdin;
2	Трудовой
\.


--
-- TOC entry 4950 (class 0 OID 25728)
-- Dependencies: 231
-- Data for Name: types_of_payments; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.types_of_payments (id_type_of_payment, name) FROM stdin;
2	СБП
\.


--
-- TOC entry 4943 (class 0 OID 25633)
-- Dependencies: 224
-- Data for Name: vat_rates; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.vat_rates (id_vat_rate, percent) FROM stdin;
1	20.00
4	15.30
5	100000.00
\.


--
-- TOC entry 4965 (class 0 OID 0)
-- Dependencies: 227
-- Name: contracts_id_contracts_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.contracts_id_contracts_seq', 4, true);


--
-- TOC entry 4966 (class 0 OID 0)
-- Dependencies: 225
-- Name: organizations_id_organizations_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.organizations_id_organizations_seq', 4, true);


--
-- TOC entry 4967 (class 0 OID 0)
-- Dependencies: 233
-- Name: stages_of_contracts_stage_number_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.stages_of_contracts_stage_number_seq', 3, true);


--
-- TOC entry 4968 (class 0 OID 0)
-- Dependencies: 221
-- Name: stages_of_execution_id_stages_of_execution_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.stages_of_execution_id_stages_of_execution_seq', 3, true);


--
-- TOC entry 4969 (class 0 OID 0)
-- Dependencies: 219
-- Name: types_of_contracts_id_types_of_contracts_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.types_of_contracts_id_types_of_contracts_seq', 2, true);


--
-- TOC entry 4970 (class 0 OID 0)
-- Dependencies: 230
-- Name: types_of_payments_id_type_of_payment_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.types_of_payments_id_type_of_payment_seq', 3, true);


--
-- TOC entry 4971 (class 0 OID 0)
-- Dependencies: 223
-- Name: vat_rates_id_vat_rates_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.vat_rates_id_vat_rates_seq', 9, true);


--
-- TOC entry 4775 (class 2606 OID 25679)
-- Name: contracts contracts_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contracts
    ADD CONSTRAINT contracts_pkey PRIMARY KEY (id_contract);


--
-- TOC entry 4773 (class 2606 OID 25661)
-- Name: organizations organizations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.organizations
    ADD CONSTRAINT organizations_pkey PRIMARY KEY (id_organization);


--
-- TOC entry 4781 (class 2606 OID 25746)
-- Name: payment payment_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.payment
    ADD CONSTRAINT payment_pkey PRIMARY KEY (id_contract);


--
-- TOC entry 4777 (class 2606 OID 25716)
-- Name: stages_of_contracts stages_of_contracts_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.stages_of_contracts
    ADD CONSTRAINT stages_of_contracts_pkey PRIMARY KEY (id_contract, stage_number);


--
-- TOC entry 4769 (class 2606 OID 25631)
-- Name: stages_of_execution stages_of_execution_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.stages_of_execution
    ADD CONSTRAINT stages_of_execution_pkey PRIMARY KEY (id_stage_of_execution);


--
-- TOC entry 4767 (class 2606 OID 25623)
-- Name: types_of_contracts types_of_contracts_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.types_of_contracts
    ADD CONSTRAINT types_of_contracts_pkey PRIMARY KEY (id_type_of_contract);


--
-- TOC entry 4779 (class 2606 OID 25735)
-- Name: types_of_payments types_of_payments_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.types_of_payments
    ADD CONSTRAINT types_of_payments_pkey PRIMARY KEY (id_type_of_payment);


--
-- TOC entry 4771 (class 2606 OID 25639)
-- Name: vat_rates vat_rates_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vat_rates
    ADD CONSTRAINT vat_rates_pkey PRIMARY KEY (id_vat_rate);


--
-- TOC entry 4782 (class 2606 OID 25680)
-- Name: contracts contracts_fk_id_customer_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contracts
    ADD CONSTRAINT contracts_fk_id_customer_fkey FOREIGN KEY (fk_id_customer) REFERENCES public.organizations(id_organization) ON DELETE CASCADE;


--
-- TOC entry 4783 (class 2606 OID 25685)
-- Name: contracts contracts_fk_id_performer_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contracts
    ADD CONSTRAINT contracts_fk_id_performer_fkey FOREIGN KEY (fk_id_performer) REFERENCES public.organizations(id_organization) ON DELETE CASCADE;


--
-- TOC entry 4784 (class 2606 OID 25695)
-- Name: contracts contracts_fk_id_stages_of_execution_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contracts
    ADD CONSTRAINT contracts_fk_id_stages_of_execution_fkey FOREIGN KEY (fk_id_stage_of_execution) REFERENCES public.stages_of_execution(id_stage_of_execution) ON DELETE CASCADE;


--
-- TOC entry 4785 (class 2606 OID 25690)
-- Name: contracts contracts_fk_id_types_of_contracts_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contracts
    ADD CONSTRAINT contracts_fk_id_types_of_contracts_fkey FOREIGN KEY (fk_id_type_of_contract) REFERENCES public.types_of_contracts(id_type_of_contract) ON DELETE CASCADE;


--
-- TOC entry 4786 (class 2606 OID 25700)
-- Name: contracts contracts_fk_id_vat_rates_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contracts
    ADD CONSTRAINT contracts_fk_id_vat_rates_fkey FOREIGN KEY (fk_id_vat_rate) REFERENCES public.vat_rates(id_vat_rate) ON DELETE CASCADE;


--
-- TOC entry 4789 (class 2606 OID 25752)
-- Name: payment payment_fk_id_type_of_payment_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.payment
    ADD CONSTRAINT payment_fk_id_type_of_payment_fkey FOREIGN KEY (fk_id_type_of_payment) REFERENCES public.types_of_payments(id_type_of_payment) ON DELETE CASCADE;


--
-- TOC entry 4790 (class 2606 OID 25747)
-- Name: payment payment_id_contract_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.payment
    ADD CONSTRAINT payment_id_contract_fkey FOREIGN KEY (id_contract) REFERENCES public.contracts(id_contract) ON DELETE CASCADE;


--
-- TOC entry 4787 (class 2606 OID 25717)
-- Name: stages_of_contracts stages_of_contracts_fk_id_stages_of_execution_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.stages_of_contracts
    ADD CONSTRAINT stages_of_contracts_fk_id_stages_of_execution_fkey FOREIGN KEY (fk_id_stages_of_execution) REFERENCES public.stages_of_execution(id_stage_of_execution) ON DELETE CASCADE;


--
-- TOC entry 4788 (class 2606 OID 25722)
-- Name: stages_of_contracts stages_of_contracts_id_contract_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.stages_of_contracts
    ADD CONSTRAINT stages_of_contracts_id_contract_fkey FOREIGN KEY (id_contract) REFERENCES public.contracts(id_contract) ON DELETE CASCADE;


-- Completed on 2026-04-22 01:34:53

--
-- PostgreSQL database dump complete
--

\unrestrict Qaz2SbyzFiO9LZFc2YaWst5tRKF4PxGoSruybUNgowJUQ0n0btK7QoWWArnLBRm

