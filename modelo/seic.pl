:-dynamic tiene/1.
lista([]):-enfermedad(E),write(E).
lista([H|T]):-assert(tiene(H)),lista(T).
test(X) :-limpiar,lista(X).% write( 'Hola mundo cruel ' ),write(X).

enfermedad('COVID-19').
enfermedad('Mononucleosis Infecciosa').
enfermedad('Dengue Clasico').
enfermedad('Sarampion').

%:-dynamic tiene/1.
%enfermedad('A'):-tiene(s1),tiene(s2).
%enfermedad('B'):-tiene(s1),tiene(s3).
%enfermedad('IS'):-tiene(s1),tiene(s3).
%enfermedad('HE'):-tiene(s1),tiene(s4),tiene(s10),tiene(s11).

enfermedad('COVID-19') :- tiene(s1), tiene(s2), tiene(s3), tiene(s4), tiene(s5), tiene(s6), tiene(s7).
enfermedad('Mononucleosis Infecciosa') :- tiene(s1), tiene(s2), tiene(s3), tiene(s6).
enfermedad('Dengue Clasico') :-tiene(s1), tiene(s2), tiene(s4), tiene(s5).
enfermedad('Sarampion') :- tiene(s1), tiene(s3), tiene(s4), tiene(s7).

% Regla para listar todas las enfermedades
listar_enfermedades(Enfermedades) :-
    findall(E, enfermedad(E), Enfermedades).

enfermedad(_):-fail.
limpiar:-retract(tiene(_)),fail.
limpiar.
