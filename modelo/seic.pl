:- dynamic tiene/1.

% Regla principal para procesar los s�ntomas
test(X) :-
    limpiar,
    lista(X).

% Inserta s�ntomas al sistema
lista([]).
lista([H|T]) :-
    assert(tiene(H)),
    lista(T).

% Enfermedades ordenadas por especificidad (m�s s�ntomas primero)
enfermedad('COVID-19') :- tiene(s1), tiene(s2), tiene(s3), tiene(s4), tiene(s5), tiene(s6), tiene(s7).
enfermedad('Mononucleosis Infecciosa') :- tiene(s1), tiene(s2), tiene(s3), tiene(s6).
enfermedad('Dengue Clasico') :- tiene(s1), tiene(s2), tiene(s4), tiene(s5).
enfermedad('Sarampion') :- tiene(s1), tiene(s3), tiene(s4), tiene(s7).

% Diagn�stico principal que el sistema debe usar
diagnostico(E) :- enfermedad(E), !.
diagnostico('La informaci�n no es suficiente').

% Limpia s�ntomas previos
limpiar :- retract(tiene(_)), fail.
limpiar.