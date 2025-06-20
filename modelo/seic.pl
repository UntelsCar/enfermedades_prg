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

% Enfermedades ordenadas por especificidad (mas síntomas primero)
enfermedad('COVID-19') :- tiene(s1), tiene(s2), tiene(s3), tiene(s4), tiene(s5), tiene(s6), tiene(s8).
enfermedad('Mononucleosis Infecciosa') :- tiene(s1), tiene(s2), tiene(s3), tiene(s6).
enfermedad('Dengue Clasico') :- tiene(s1), tiene(s2), tiene(s3), tiene(s5).
enfermedad('Sarampion') :- tiene(s1), tiene(s4), tiene(s7).
% Diagnóstico principal

% Agregado desde PHP

enfermedad('nEnfermedad1') :- tiene(s1), tiene(s3), tiene(s5).

%aquiAgregar

diagnostico(Mejor) :-
    findall(Coincidencias-Nombre, (enfermedad(Nombre), contar_sintomas(Nombre, Coincidencias)), Lista),
    sort(0, @>=, Lista, [ _-Mejor | _ ]).

contar_sintomas(Nombre, Cantidad) :-
    clause(enfermedad(Nombre), Cuerpo),
    contar(Cuerpo, Cantidad).

contar((tiene(S), R), N) :-
    tiene(S),
    contar(R, N1),
    N is N1 + 1.
contar((tiene(_), R), N) :- 
    contar(R, N).
contar(tiene(S), 1) :-
    tiene(S).
contar(tiene(_), 0).

diagnostico('La informacion no es suficiente').

% Limpia síntomas previos
limpiar :- retract(tiene(_)), fail.
limpiar.

% === ESTA ES LA PARTE CRUCIAL QUE TE FALTA: LISTAR ENFERMEDADES ===
listar_enfermedades(L) :-
    findall(N, clause(enfermedad(N), _), L).
