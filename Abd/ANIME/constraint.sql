use anime;

alter table ANIME
    add constraint pk_Anime primary key (IdAnime, IdNumero)
    ;

alter table GENERO
    add constraint pk_Gen primary key (IdGen)
    ;

alter table GEN_ANIME
    add constraint fk_Anime_GenAni foreign key (IdA, IdN) 
        references ANIME(IdAnime, IdNumero),
    add constraint fk_Gen_GenAni foreign key (IdGen) 
        references GENERO(IdGen)   
    ;

alter table OPINION
    add constraint fk_Anime_Opinion foreign key (IdA, IdN)
        references ANIME(IdAnime, IdNumero)
    ;

alter table ESTADO

    add constraint pk_Estado primary key (Temporada, IdA, IdN),
    add constraint fk_Anime_Estado foreign key (IdA, IdN)
        references ANIME(IdAnime, IdNumero)
    ;

alter table FRANQUICIA
    add constraint fk_Anime_Franquicia foreign key (IdA, IdN)
        references ANIME(IdAnime, IdNumero)
    ;


