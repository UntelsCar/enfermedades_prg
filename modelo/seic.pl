:- dynamic tiene/1.

% Regla principal para procesar los síntomas
test(X) :-
    limpiar,
    lista(X).

% Inserta síntomas al sistema
lista([]).
lista([H|T]) :-
    assert(tiene(H)),
    lista(T).

% Enfermedades ordenadas por especificidad (más síntomas primero)
enfermedad('COVID-19') :- tiene(s1), tiene(s2), tiene(s3), tiene(s4), tiene(s5), tiene(s6), tiene(s7).
enfermedad('Mononucleosis Infecciosa') :- tiene(s1), tiene(s2), tiene(s3), tiene(s6).
enfermedad('Dengue Clasico') :- tiene(s1), tiene(s2), tiene(s4), tiene(s5).
enfermedad('Sarampion') :- tiene(s1), tiene(s3), tiene(s4), tiene(s7).
% Diagnóstico principal

% Agregado desde PHP

diagnostico(E) :- enfermedad(E), !.
diagnostico('La informacion no es suficiente').

% Limpia síntomas previos
limpiar :- retract(tiene(_)), fail.
limpiar.

% === ESTA ES LA PARTE CRUCIAL QUE TE FALTA: LISTAR ENFERMEDADES ===
listar_enfermedades(L) :-
    findall(N, clause(enfermedad(N), _), L).

