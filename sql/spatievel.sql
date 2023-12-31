PGDMP  #    
            	    {         	   spatievel    16.0    16.0 x    F           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            G           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            H           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            I           1262    16397 	   spatievel    DATABASE     �   CREATE DATABASE spatievel WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'English_Indonesia.1252';
    DROP DATABASE spatievel;
                postgres    false            �            1259    24020    barang    TABLE        CREATE TABLE public.barang (
    id bigint NOT NULL,
    kode_barang character varying(50) NOT NULL,
    nama_barang character varying(150) NOT NULL,
    deskripsi text NOT NULL,
    stok integer NOT NULL,
    thumbnail character varying(255),
    harga integer NOT NULL,
    slug character varying(255) NOT NULL,
    flag character varying(255),
    unit_kerja_id bigint NOT NULL,
    supplier_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    path character varying(255)
);
    DROP TABLE public.barang;
       public         heap    postgres    false            �            1259    24019    barang_id_seq    SEQUENCE     v   CREATE SEQUENCE public.barang_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.barang_id_seq;
       public          postgres    false    236            J           0    0    barang_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.barang_id_seq OWNED BY public.barang.id;
          public          postgres    false    235            �            1259    23925    failed_jobs    TABLE     &  CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.failed_jobs;
       public         heap    postgres    false            �            1259    23924    failed_jobs_id_seq    SEQUENCE     {   CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.failed_jobs_id_seq;
       public          postgres    false    223            K           0    0    failed_jobs_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;
          public          postgres    false    222            �            1259    24069    history_pesanan    TABLE     �  CREATE TABLE public.history_pesanan (
    id bigint NOT NULL,
    status_pesanan character varying(255) NOT NULL,
    keterangan text NOT NULL,
    pesanan_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT history_pesanan_status_pesanan_check CHECK (((status_pesanan)::text = ANY ((ARRAY['disetujui'::character varying, 'ditolak'::character varying])::text[])))
);
 #   DROP TABLE public.history_pesanan;
       public         heap    postgres    false            �            1259    24068    history_pesanan_id_seq    SEQUENCE        CREATE SEQUENCE public.history_pesanan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.history_pesanan_id_seq;
       public          postgres    false    242            L           0    0    history_pesanan_id_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.history_pesanan_id_seq OWNED BY public.history_pesanan.id;
          public          postgres    false    241            �            1259    23886 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    postgres    false            �            1259    23885    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          postgres    false    216            M           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          postgres    false    215            �            1259    23970    model_has_permissions    TABLE     �   CREATE TABLE public.model_has_permissions (
    permission_id bigint NOT NULL,
    model_type character varying(255) NOT NULL,
    model_id bigint NOT NULL
);
 )   DROP TABLE public.model_has_permissions;
       public         heap    postgres    false            �            1259    23981    model_has_roles    TABLE     �   CREATE TABLE public.model_has_roles (
    role_id bigint NOT NULL,
    model_type character varying(255) NOT NULL,
    model_id bigint NOT NULL
);
 #   DROP TABLE public.model_has_roles;
       public         heap    postgres    false            �            1259    23917    password_reset_tokens    TABLE     �   CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 )   DROP TABLE public.password_reset_tokens;
       public         heap    postgres    false            �            1259    23949    permissions    TABLE     �   CREATE TABLE public.permissions (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    guard_name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.permissions;
       public         heap    postgres    false            �            1259    23948    permissions_id_seq    SEQUENCE     {   CREATE SEQUENCE public.permissions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.permissions_id_seq;
       public          postgres    false    227            N           0    0    permissions_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.permissions_id_seq OWNED BY public.permissions.id;
          public          postgres    false    226            �            1259    23937    personal_access_tokens    TABLE     �  CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 *   DROP TABLE public.personal_access_tokens;
       public         heap    postgres    false            �            1259    23936    personal_access_tokens_id_seq    SEQUENCE     �   CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.personal_access_tokens_id_seq;
       public          postgres    false    225            O           0    0    personal_access_tokens_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;
          public          postgres    false    224            �            1259    24039    pesanan    TABLE     B  CREATE TABLE public.pesanan (
    id bigint NOT NULL,
    kode_pesanan character varying(50) NOT NULL,
    tanggal_pesanan date NOT NULL,
    total_harga integer NOT NULL,
    status_pesanan character varying(255) NOT NULL,
    user_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT pesanan_status_pesanan_check CHECK (((status_pesanan)::text = ANY ((ARRAY['belum dipesan'::character varying, 'proses'::character varying, 'disetujui'::character varying, 'ditolak'::character varying])::text[])))
);
    DROP TABLE public.pesanan;
       public         heap    postgres    false            �            1259    24052    pesanan_details    TABLE     %  CREATE TABLE public.pesanan_details (
    id bigint NOT NULL,
    quantity integer NOT NULL,
    total_harga_barang integer NOT NULL,
    pesanan_id bigint NOT NULL,
    barang_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 #   DROP TABLE public.pesanan_details;
       public         heap    postgres    false            �            1259    24051    pesanan_details_id_seq    SEQUENCE        CREATE SEQUENCE public.pesanan_details_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.pesanan_details_id_seq;
       public          postgres    false    240            P           0    0    pesanan_details_id_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.pesanan_details_id_seq OWNED BY public.pesanan_details.id;
          public          postgres    false    239            �            1259    24038    pesanan_id_seq    SEQUENCE     w   CREATE SEQUENCE public.pesanan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.pesanan_id_seq;
       public          postgres    false    238            Q           0    0    pesanan_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.pesanan_id_seq OWNED BY public.pesanan.id;
          public          postgres    false    237            �            1259    23992    role_has_permissions    TABLE     m   CREATE TABLE public.role_has_permissions (
    permission_id bigint NOT NULL,
    role_id bigint NOT NULL
);
 (   DROP TABLE public.role_has_permissions;
       public         heap    postgres    false            �            1259    23960    roles    TABLE     �   CREATE TABLE public.roles (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    guard_name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.roles;
       public         heap    postgres    false            �            1259    23959    roles_id_seq    SEQUENCE     u   CREATE SEQUENCE public.roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.roles_id_seq;
       public          postgres    false    229            R           0    0    roles_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.roles_id_seq OWNED BY public.roles.id;
          public          postgres    false    228            �            1259    24008 	   suppliers    TABLE     m  CREATE TABLE public.suppliers (
    id bigint NOT NULL,
    kode_supplier character varying(50) NOT NULL,
    nama_supplier character varying(150) NOT NULL,
    telepon character varying(15) NOT NULL,
    flag character varying(255),
    unit_kerja_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.suppliers;
       public         heap    postgres    false            �            1259    24007    suppliers_id_seq    SEQUENCE     y   CREATE SEQUENCE public.suppliers_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.suppliers_id_seq;
       public          postgres    false    234            S           0    0    suppliers_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.suppliers_id_seq OWNED BY public.suppliers.id;
          public          postgres    false    233            �            1259    23893 
   unit_kerja    TABLE     8  CREATE TABLE public.unit_kerja (
    id bigint NOT NULL,
    kode_unit character varying(50) NOT NULL,
    nama_unit character varying(150) NOT NULL,
    slug character varying(255),
    flag character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.unit_kerja;
       public         heap    postgres    false            �            1259    23892    unit_kerja_id_seq    SEQUENCE     z   CREATE SEQUENCE public.unit_kerja_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.unit_kerja_id_seq;
       public          postgres    false    218            T           0    0    unit_kerja_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.unit_kerja_id_seq OWNED BY public.unit_kerja.id;
          public          postgres    false    217            �            1259    23902    users    TABLE     b  CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(35) NOT NULL,
    password character varying(255) NOT NULL,
    jabatan character varying(150),
    path character varying(255),
    foto character varying(255),
    role character varying(35),
    slug character varying(255),
    flag character varying(255),
    unit_kerja_id bigint NOT NULL,
    email_verified_at timestamp(0) without time zone,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.users;
       public         heap    postgres    false            �            1259    23901    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          postgres    false    220            U           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public          postgres    false    219            Z           2604    24023 	   barang id    DEFAULT     f   ALTER TABLE ONLY public.barang ALTER COLUMN id SET DEFAULT nextval('public.barang_id_seq'::regclass);
 8   ALTER TABLE public.barang ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    235    236    236            T           2604    23928    failed_jobs id    DEFAULT     p   ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);
 =   ALTER TABLE public.failed_jobs ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    223    222    223            ]           2604    24072    history_pesanan id    DEFAULT     x   ALTER TABLE ONLY public.history_pesanan ALTER COLUMN id SET DEFAULT nextval('public.history_pesanan_id_seq'::regclass);
 A   ALTER TABLE public.history_pesanan ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    242    241    242            Q           2604    23889    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    216    215    216            W           2604    23952    permissions id    DEFAULT     p   ALTER TABLE ONLY public.permissions ALTER COLUMN id SET DEFAULT nextval('public.permissions_id_seq'::regclass);
 =   ALTER TABLE public.permissions ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    227    226    227            V           2604    23940    personal_access_tokens id    DEFAULT     �   ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);
 H   ALTER TABLE public.personal_access_tokens ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    225    224    225            [           2604    24042 
   pesanan id    DEFAULT     h   ALTER TABLE ONLY public.pesanan ALTER COLUMN id SET DEFAULT nextval('public.pesanan_id_seq'::regclass);
 9   ALTER TABLE public.pesanan ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    238    237    238            \           2604    24055    pesanan_details id    DEFAULT     x   ALTER TABLE ONLY public.pesanan_details ALTER COLUMN id SET DEFAULT nextval('public.pesanan_details_id_seq'::regclass);
 A   ALTER TABLE public.pesanan_details ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    240    239    240            X           2604    23963    roles id    DEFAULT     d   ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);
 7   ALTER TABLE public.roles ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    228    229    229            Y           2604    24011    suppliers id    DEFAULT     l   ALTER TABLE ONLY public.suppliers ALTER COLUMN id SET DEFAULT nextval('public.suppliers_id_seq'::regclass);
 ;   ALTER TABLE public.suppliers ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    234    233    234            R           2604    23896    unit_kerja id    DEFAULT     n   ALTER TABLE ONLY public.unit_kerja ALTER COLUMN id SET DEFAULT nextval('public.unit_kerja_id_seq'::regclass);
 <   ALTER TABLE public.unit_kerja ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    217    218    218            S           2604    23905    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    220    219    220            =          0    24020    barang 
   TABLE DATA           �   COPY public.barang (id, kode_barang, nama_barang, deskripsi, stok, thumbnail, harga, slug, flag, unit_kerja_id, supplier_id, created_at, updated_at, path) FROM stdin;
    public          postgres    false    236   #�       0          0    23925    failed_jobs 
   TABLE DATA           a   COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
    public          postgres    false    223   #�       C          0    24069    history_pesanan 
   TABLE DATA           m   COPY public.history_pesanan (id, status_pesanan, keterangan, pesanan_id, created_at, updated_at) FROM stdin;
    public          postgres    false    242   @�       )          0    23886 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public          postgres    false    216   ]�       7          0    23970    model_has_permissions 
   TABLE DATA           T   COPY public.model_has_permissions (permission_id, model_type, model_id) FROM stdin;
    public          postgres    false    230   I�       8          0    23981    model_has_roles 
   TABLE DATA           H   COPY public.model_has_roles (role_id, model_type, model_id) FROM stdin;
    public          postgres    false    231   f�       .          0    23917    password_reset_tokens 
   TABLE DATA           I   COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
    public          postgres    false    221   ��       4          0    23949    permissions 
   TABLE DATA           S   COPY public.permissions (id, name, guard_name, created_at, updated_at) FROM stdin;
    public          postgres    false    227   ҝ       2          0    23937    personal_access_tokens 
   TABLE DATA           �   COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
    public          postgres    false    225   �       ?          0    24039    pesanan 
   TABLE DATA           �   COPY public.pesanan (id, kode_pesanan, tanggal_pesanan, total_harga, status_pesanan, user_id, created_at, updated_at) FROM stdin;
    public          postgres    false    238   �       A          0    24052    pesanan_details 
   TABLE DATA           z   COPY public.pesanan_details (id, quantity, total_harga_barang, pesanan_id, barang_id, created_at, updated_at) FROM stdin;
    public          postgres    false    240   )�       9          0    23992    role_has_permissions 
   TABLE DATA           F   COPY public.role_has_permissions (permission_id, role_id) FROM stdin;
    public          postgres    false    232   F�       6          0    23960    roles 
   TABLE DATA           M   COPY public.roles (id, name, guard_name, created_at, updated_at) FROM stdin;
    public          postgres    false    229   c�       ;          0    24008 	   suppliers 
   TABLE DATA           {   COPY public.suppliers (id, kode_supplier, nama_supplier, telepon, flag, unit_kerja_id, created_at, updated_at) FROM stdin;
    public          postgres    false    234   ��       +          0    23893 
   unit_kerja 
   TABLE DATA           b   COPY public.unit_kerja (id, kode_unit, nama_unit, slug, flag, created_at, updated_at) FROM stdin;
    public          postgres    false    218   A�       -          0    23902    users 
   TABLE DATA           �   COPY public.users (id, name, email, password, jabatan, path, foto, role, slug, flag, unit_kerja_id, email_verified_at, remember_token, created_at, updated_at) FROM stdin;
    public          postgres    false    220   �       V           0    0    barang_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.barang_id_seq', 6, true);
          public          postgres    false    235            W           0    0    failed_jobs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);
          public          postgres    false    222            X           0    0    history_pesanan_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.history_pesanan_id_seq', 1, false);
          public          postgres    false    241            Y           0    0    migrations_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.migrations_id_seq', 11, true);
          public          postgres    false    215            Z           0    0    permissions_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.permissions_id_seq', 1, false);
          public          postgres    false    226            [           0    0    personal_access_tokens_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);
          public          postgres    false    224            \           0    0    pesanan_details_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.pesanan_details_id_seq', 1, false);
          public          postgres    false    239            ]           0    0    pesanan_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.pesanan_id_seq', 1, false);
          public          postgres    false    237            ^           0    0    roles_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.roles_id_seq', 3, true);
          public          postgres    false    228            _           0    0    suppliers_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.suppliers_id_seq', 4, true);
          public          postgres    false    233            `           0    0    unit_kerja_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.unit_kerja_id_seq', 5, true);
          public          postgres    false    217            a           0    0    users_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.users_id_seq', 8, true);
          public          postgres    false    219            �           2606    24027    barang barang_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.barang
    ADD CONSTRAINT barang_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.barang DROP CONSTRAINT barang_pkey;
       public            postgres    false    236            k           2606    23933    failed_jobs failed_jobs_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_pkey;
       public            postgres    false    223            m           2606    23935 #   failed_jobs failed_jobs_uuid_unique 
   CONSTRAINT     ^   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);
 M   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_uuid_unique;
       public            postgres    false    223            �           2606    24077 $   history_pesanan history_pesanan_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.history_pesanan
    ADD CONSTRAINT history_pesanan_pkey PRIMARY KEY (id);
 N   ALTER TABLE ONLY public.history_pesanan DROP CONSTRAINT history_pesanan_pkey;
       public            postgres    false    242            a           2606    23891    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            postgres    false    216            }           2606    23980 0   model_has_permissions model_has_permissions_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.model_has_permissions
    ADD CONSTRAINT model_has_permissions_pkey PRIMARY KEY (permission_id, model_id, model_type);
 Z   ALTER TABLE ONLY public.model_has_permissions DROP CONSTRAINT model_has_permissions_pkey;
       public            postgres    false    230    230    230            �           2606    23991 $   model_has_roles model_has_roles_pkey 
   CONSTRAINT     }   ALTER TABLE ONLY public.model_has_roles
    ADD CONSTRAINT model_has_roles_pkey PRIMARY KEY (role_id, model_id, model_type);
 N   ALTER TABLE ONLY public.model_has_roles DROP CONSTRAINT model_has_roles_pkey;
       public            postgres    false    231    231    231            i           2606    23923 0   password_reset_tokens password_reset_tokens_pkey 
   CONSTRAINT     q   ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);
 Z   ALTER TABLE ONLY public.password_reset_tokens DROP CONSTRAINT password_reset_tokens_pkey;
       public            postgres    false    221            t           2606    23958 .   permissions permissions_name_guard_name_unique 
   CONSTRAINT     u   ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT permissions_name_guard_name_unique UNIQUE (name, guard_name);
 X   ALTER TABLE ONLY public.permissions DROP CONSTRAINT permissions_name_guard_name_unique;
       public            postgres    false    227    227            v           2606    23956    permissions permissions_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT permissions_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.permissions DROP CONSTRAINT permissions_pkey;
       public            postgres    false    227            o           2606    23944 2   personal_access_tokens personal_access_tokens_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);
 \   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_pkey;
       public            postgres    false    225            q           2606    23947 :   personal_access_tokens personal_access_tokens_token_unique 
   CONSTRAINT     v   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);
 d   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_token_unique;
       public            postgres    false    225            �           2606    24057 $   pesanan_details pesanan_details_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.pesanan_details
    ADD CONSTRAINT pesanan_details_pkey PRIMARY KEY (id);
 N   ALTER TABLE ONLY public.pesanan_details DROP CONSTRAINT pesanan_details_pkey;
       public            postgres    false    240            �           2606    24045    pesanan pesanan_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.pesanan
    ADD CONSTRAINT pesanan_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.pesanan DROP CONSTRAINT pesanan_pkey;
       public            postgres    false    238            �           2606    24006 .   role_has_permissions role_has_permissions_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.role_has_permissions
    ADD CONSTRAINT role_has_permissions_pkey PRIMARY KEY (permission_id, role_id);
 X   ALTER TABLE ONLY public.role_has_permissions DROP CONSTRAINT role_has_permissions_pkey;
       public            postgres    false    232    232            x           2606    23969 "   roles roles_name_guard_name_unique 
   CONSTRAINT     i   ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_name_guard_name_unique UNIQUE (name, guard_name);
 L   ALTER TABLE ONLY public.roles DROP CONSTRAINT roles_name_guard_name_unique;
       public            postgres    false    229    229            z           2606    23967    roles roles_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.roles DROP CONSTRAINT roles_pkey;
       public            postgres    false    229            �           2606    24013    suppliers suppliers_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.suppliers
    ADD CONSTRAINT suppliers_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.suppliers DROP CONSTRAINT suppliers_pkey;
       public            postgres    false    234            c           2606    23900    unit_kerja unit_kerja_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.unit_kerja
    ADD CONSTRAINT unit_kerja_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.unit_kerja DROP CONSTRAINT unit_kerja_pkey;
       public            postgres    false    218            e           2606    23916    users users_email_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public            postgres    false    220            g           2606    23909    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    220            {           1259    23973 /   model_has_permissions_model_id_model_type_index    INDEX     �   CREATE INDEX model_has_permissions_model_id_model_type_index ON public.model_has_permissions USING btree (model_id, model_type);
 C   DROP INDEX public.model_has_permissions_model_id_model_type_index;
       public            postgres    false    230    230            ~           1259    23984 )   model_has_roles_model_id_model_type_index    INDEX     u   CREATE INDEX model_has_roles_model_id_model_type_index ON public.model_has_roles USING btree (model_id, model_type);
 =   DROP INDEX public.model_has_roles_model_id_model_type_index;
       public            postgres    false    231    231            r           1259    23945 8   personal_access_tokens_tokenable_type_tokenable_id_index    INDEX     �   CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);
 L   DROP INDEX public.personal_access_tokens_tokenable_type_tokenable_id_index;
       public            postgres    false    225    225            �           2606    24033 !   barang barang_supplier_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.barang
    ADD CONSTRAINT barang_supplier_id_foreign FOREIGN KEY (supplier_id) REFERENCES public.suppliers(id) ON UPDATE CASCADE ON DELETE CASCADE;
 K   ALTER TABLE ONLY public.barang DROP CONSTRAINT barang_supplier_id_foreign;
       public          postgres    false    234    4740    236            �           2606    24028 #   barang barang_unit_kerja_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.barang
    ADD CONSTRAINT barang_unit_kerja_id_foreign FOREIGN KEY (unit_kerja_id) REFERENCES public.unit_kerja(id) ON UPDATE CASCADE ON DELETE CASCADE;
 M   ALTER TABLE ONLY public.barang DROP CONSTRAINT barang_unit_kerja_id_foreign;
       public          postgres    false    4707    236    218            �           2606    24078 2   history_pesanan history_pesanan_pesanan_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.history_pesanan
    ADD CONSTRAINT history_pesanan_pesanan_id_foreign FOREIGN KEY (pesanan_id) REFERENCES public.pesanan(id) ON UPDATE CASCADE ON DELETE CASCADE;
 \   ALTER TABLE ONLY public.history_pesanan DROP CONSTRAINT history_pesanan_pesanan_id_foreign;
       public          postgres    false    242    4744    238            �           2606    23974 A   model_has_permissions model_has_permissions_permission_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.model_has_permissions
    ADD CONSTRAINT model_has_permissions_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES public.permissions(id) ON DELETE CASCADE;
 k   ALTER TABLE ONLY public.model_has_permissions DROP CONSTRAINT model_has_permissions_permission_id_foreign;
       public          postgres    false    4726    227    230            �           2606    23985 /   model_has_roles model_has_roles_role_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.model_has_roles
    ADD CONSTRAINT model_has_roles_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id) ON DELETE CASCADE;
 Y   ALTER TABLE ONLY public.model_has_roles DROP CONSTRAINT model_has_roles_role_id_foreign;
       public          postgres    false    229    231    4730            �           2606    24063 1   pesanan_details pesanan_details_barang_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.pesanan_details
    ADD CONSTRAINT pesanan_details_barang_id_foreign FOREIGN KEY (barang_id) REFERENCES public.barang(id) ON UPDATE CASCADE ON DELETE CASCADE;
 [   ALTER TABLE ONLY public.pesanan_details DROP CONSTRAINT pesanan_details_barang_id_foreign;
       public          postgres    false    4742    240    236            �           2606    24058 2   pesanan_details pesanan_details_pesanan_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.pesanan_details
    ADD CONSTRAINT pesanan_details_pesanan_id_foreign FOREIGN KEY (pesanan_id) REFERENCES public.pesanan(id) ON UPDATE CASCADE ON DELETE CASCADE;
 \   ALTER TABLE ONLY public.pesanan_details DROP CONSTRAINT pesanan_details_pesanan_id_foreign;
       public          postgres    false    238    4744    240            �           2606    24046    pesanan pesanan_user_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.pesanan
    ADD CONSTRAINT pesanan_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON UPDATE CASCADE ON DELETE CASCADE;
 I   ALTER TABLE ONLY public.pesanan DROP CONSTRAINT pesanan_user_id_foreign;
       public          postgres    false    4711    220    238            �           2606    23995 ?   role_has_permissions role_has_permissions_permission_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.role_has_permissions
    ADD CONSTRAINT role_has_permissions_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES public.permissions(id) ON DELETE CASCADE;
 i   ALTER TABLE ONLY public.role_has_permissions DROP CONSTRAINT role_has_permissions_permission_id_foreign;
       public          postgres    false    227    4726    232            �           2606    24000 9   role_has_permissions role_has_permissions_role_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.role_has_permissions
    ADD CONSTRAINT role_has_permissions_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id) ON DELETE CASCADE;
 c   ALTER TABLE ONLY public.role_has_permissions DROP CONSTRAINT role_has_permissions_role_id_foreign;
       public          postgres    false    229    4730    232            �           2606    24014 )   suppliers suppliers_unit_kerja_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.suppliers
    ADD CONSTRAINT suppliers_unit_kerja_id_foreign FOREIGN KEY (unit_kerja_id) REFERENCES public.unit_kerja(id) ON UPDATE CASCADE ON DELETE CASCADE;
 S   ALTER TABLE ONLY public.suppliers DROP CONSTRAINT suppliers_unit_kerja_id_foreign;
       public          postgres    false    234    218    4707            �           2606    23910 !   users users_unit_kerja_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_unit_kerja_id_foreign FOREIGN KEY (unit_kerja_id) REFERENCES public.unit_kerja(id) ON UPDATE CASCADE ON DELETE CASCADE;
 K   ALTER TABLE ONLY public.users DROP CONSTRAINT users_unit_kerja_id_foreign;
       public          postgres    false    4707    220    218            =   �   x��An� E��)�403�v]E��٠�I-E�b'��Du�+t�}���G����ea��u�x.q�)��k�߀���}�P�9b띥]|H~4v�}�N��7�j�,8/������>��&��KNX�	|��@j�j�yk�B�Q-Ү[l�~���W�i�5vd�C�%�cN���1ΘF8$�,�6�C�q(%���S�}:��a����x��yH������X�3�c�7����      0      x������ � �      C      x������ � �      )   �   x�e�An�0���p�*Ӂ�T��mfh��F�}CQ	�,X}��.�$0@���1G�����n�y��U�y}�*!�����>}�(�J����r�kؓ�h}�;�Y&��!�v��n��t�w<�����^SY7�)4=���˪Z�6��_3OC��s},�l�_�����}dڗ�A��ʎ'�)1bӞ0M�o:4P6�i���j������KUU?��      7      x������ � �      8   ?   x�3�t,(����OI�)��	-N-�4�2�"j�e�E���	�QS��fXM0���=... �k9]      .      x������ � �      4      x������ � �      2      x������ � �      ?      x������ � �      A      x������ � �      9      x������ � �      6   J   x�3�,.-H-JL����,OM�4202�54�54S00�25�20�&�e�	֣�^����N�Vc���4����qqq ��&      ;   t   x�m�;�0E�zfހ�7;��l�&-n���i�"�[���$zQ���'��<�^�q !�ZD)�j��\=��T��mk_�Ц0����볻���U ���/O�<ޘ��"      +   �   x�m�M
�@�יS�*��v���q�M��?��Vϯ��)^��KP��2���Y*ꈵ�d�k"���4AAX��n�U�^�#����X�q��g)���s��R���#6��(�,
��ˇ�����'W�G���%�����-�]�z�C�      -   �  x�uQێ�0}v��^ױ���6@B����B�Re%�R�=���o\��4�9s�9s4&��I���s����,Crb4D����NQ;�!�\�U��lΫ]�>;:�k
��6��h��ߒ�8Ѣ���%?<�&?������D�'���6@:E���	2���d��Y���"�^�9�6��?��8RU�����O��5-�m��_tozt�W��rȵ+�(>�G�� �T2��?9�H��H��O��O$OW�Ȗ�(���4��>���:z�/�^�m��B3��is�	Y�����w�`��W����$SQ$�q�*�w*�����n9�8n����؄v�AW�_��/�p�ڵl�i�k��!�#�l�u %�������?.5��*}��A��˿�     