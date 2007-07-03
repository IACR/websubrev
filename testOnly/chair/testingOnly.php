<?php
/* Web Submission and Review Software
 * Written by Shai Halevi
 * This software is distributed under the terms of the open-source license
 * Common Public License (CPL) v1.0. See the terms in the file LICENSE.txt
 * in this package or at http://www.opensource.org/licenses/cpl1.0.php
 */
$needsAuthentication = true; 
require 'header.php';

if (isset($_GET['username']) && isset($_GET['password'])) {
  $urlParams = '&username='.$_GET['username'].'&password='.$_GET['password'];
}
else { $urlParams = ''; }

$queries = array(
"INSERT INTO submissions SET subId=1,
  title='On Obfuscating Point Functions',
  authors='Hoeteck Wee',
  abstract='We study the problem of obfuscation in the context of point functions 
(also known as delta functions). A point function is a Boolean
function that assumes the value 1 at exactly one point. Our main
results are as follows:

- We provide a simple construction of efficient obfuscators for
point functions for a slightly relaxed notion of obfuscation - wherein
the size of the simulator has an inverse polynomial dependency on the
distinguishing probability - which is nonetheless impossible for
general circuits. This is the first known construction of obfuscators
for a non-trivial family of functions under general computational
assumptions. Our obfuscator is based on a probabilistic hash function
constructed from a very strong one-way permutation, and does
not require any set-up assumptions. Our construction also yields
an obfuscator for point functions with multi-bit output.

- We show that such a strong one-way permutation - wherein any
polynomial-sized circuit inverts the permutation on at most a
polynomial number of inputs - can be realized using a random
permutation oracle. We prove the result by improving on the counting
argument used in [GT00]\", this result may be of independent
interest. It follows that our construction yields obfuscators for
point functions in the non-programmable random permutation oracle
model (in the sense of [N02]). Furthermore, we prove that an
assumption like the one we used is necessary for our obfuscator
construction.

- Finally, we establish two impossibility results on obfuscating
point functions which indicate that the limitations on our
construction (in simulating only adversaries with single-bit output
and in using non-uniform advice in our simulator) are in some sense
inherent. The first of the two results is a consequence of a simple
characterization of functions that can be obfuscated against general
adversaries with multi-bit output as the class of functions that are
efficiently and exactly learnable using membership queries.

We stress that prior to this work, what is known about obfuscation are
negative results for the general class of circuits [BGI01] and
positive results in the random oracle model [LPS04] or under
non-standard number-theoretic assumptions [C97]. This work
represents the first effort to bridge the gap between the two for a
natural class of functionalities.',
  category='foundations',
  keyWords='obfuscation, point functions',
  whenSubmitted='2005-1-4',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=2, 
  title='Logcrypt: Forward Security and Public Verification for Secure Audit Logs',
  authors='Jason E. Holt and Kent E. Seamons',
  abstract='Logcrypt provides strong cryptographic assurances that data stored by
a logging facility before a system compromise cannot be modified after
the compromise without detection.  We build on prior work by showing
how log creation can be separated from log verification, and
describing several additional performance and convenience features not
previously considered.',
  category='cryptographic protocols',
  keyWords='forward secrecy, audit logs, public-key cryptography',
  whenSubmitted='2005-1-4', lastModified='2005-8-26',
  comments2chair='Added performance section',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=3,
title='Cryptanalysis of Hiji-bij-bij (HBB)',
  authors='Vlastimil Klima',
  abstract='In this paper, we show several known-plaintext attacks on the stream cipher HBB which was proposed recently at INDOCRYPT 2003. The cipher can operate either as a classical stream cipher (in the B mode) or as an asynchronous stream cipher (in the SS mode). In the case of the SS mode, we present known-plaintext attacks recovering 128-bit key with the complexity 2^66 and 256-bit key with the complexity 2^67. In the case of B mode with 256-bit key, we show a known-plaintext attack recovering the whole plaintext with the complexity 2^140. All attacks need only a small part of the plaintext to be known.',
  category='secret-key cryptography',
  keyWords='cryptanalysis, Hiji-bij-bij, HBB, stream ciphers, synchronous cipher, asynchronous cipher,  equivalent keys, known-plaintext attack',
  whenSubmitted='2005-1-5',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=4,
title='Benes and Butterfly schemes revisited',
  authors='Jacques Patarin and Audrey Montreuil',
  abstract='In~\\cite{AV96}, W. Aiello and R. Venkatesan have shown how to
construct pseudo-random functions of \$2n\$ bits \$\\rightarrow 2n\$
bits from pseudo-random functions of \$n\$ bits \$\\rightarrow n\$
bits. They claimed that their construction, called \"Benes\",
reaches the optimal bound (\$m\\ll 2^n\$) of security against
adversaries with unlimited computing power but limited by \$m\$
queries in an adaptive chosen plaintext attack (CPA-2). However a
complete proof of this result is not given in~\\cite{AV96} since
one of the assertions of~\\cite{AV96} is wrong. Due to this, the
proof given in~\\cite{AV96} is valid for most attacks, but not for
all the possible chosen plaintext attacks. In this paper we will
in a way fix this problem since for all \$\\varepsilon>0\$, we will
prove CPA-2 security when \$m\\ll 2^{n(1-\\varepsilon)}\$. However we
will also see that the probability to distinguish Benes functions
from random functions is sometime larger than the term in
\$\\frac{m^2}{2^{2n}}\$ given in~\\cite{AV96}. One of the key idea in
our proof will be to notice that, when \$m\\gg2^{2n/3}\$ and
\$m\\ll2^n\$, for large number of variables linked with some critical
equalities, the average number of solutions may be large (i.e.
\$\\gg1\$) while, at the same time, the probability to have at least
one such critical equalities is negligible (i.e. \$\\ll1\$).',
  keyWords='Pseudo-random functions, unconditional security, information-theoretic primitive, design of keyed hash functions',
  whenSubmitted='2005-1-7',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=5,
title='A sufficient condition for key-privacy',
  authors='Shai Halevi',
  abstract='The notion of key privacy for encryption schemes was defined formally by Bellare, Boldyreva, Desai and Pointcheval in Asiacrypt 2001. This notion seems useful in settings where anonymity is important. In this short note we describe a (very simple) sufficient condition for key privacy. In a nutshell, a scheme that provides data privacy is guaranteed to provide also key privacy if the distribution of a *random encryption of a random message* is independent of the public key that is used for the encryption.',
  category='public-key cryptography',
  keyWords='Anonymity, key-privacy',
  whenSubmitted='2005-1-7',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=6,
title='A Metric on the Set of Elliptic Curves over \${\\mathbf F}_p\$.',
  authors='Pradeep Kumar Mishra and Kishan Chand Gupta',
  abstract='Elliptic Curves over finite field have found application in many areas including cryptography. In the current article we define a metric on the set of elliptic curves defined over a prime field \${\\mathbf F}_p, p>3\$.
',
  category='foundations',
  whenSubmitted='2005-1-10', lastModified='2005-4-15',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=7,
title='The Misuse of RC4 in Microsoft Word and Excel',
  authors='Hongjun Wu',
  abstract='In this report, we point out a serious security flaw in Microsoft Word and Excel. The stream cipher RC4 with key length up to 128 bits is used in Microsoft Word and Excel to protect the documents. But when an encrypted document gets modified and saved, the initialization vector remains the same and thus the same keystream generated from RC4 is applied to encrypt the different versions of that document. The consequence is disastrous since a lot of information of the document could be recovered easily. 
',
  category='applications',
  keyWords='Microsoft Word, Excel, Encryption, RC4, Initialization Vector',
  whenSubmitted='2005-1-10',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=8,
title='Comments on \"Distributed Symmetric Key Management for Mobile Ad hoc Networks\" from INFOCOM 2004',
  authors='J. Wu and R. Wei',
  abstract='In IEEE INFOCOM 2004, Chan proposed a distributed key management
scheme for mobile ad hoc networks, and deduced the condition under
which the key sets distributed to the network nodes can form a
cover-free family (CFF), which is the precondition that the scheme
can work. In this paper, we indicate that the condition is falsely
deduced. Furthermore, we discuss whether CFF is capable for key
distributions in ad hoc networks.',
  category='cryptographic protocols',
  keyWords='Key management',
  whenSubmitted='2005-1-5', lastModified='2005-5-5',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET  subId=9,
  title='Mixing properties of triangular feedback shift registers',
  authors='Bernd Schomburg',
  abstract='The purpose of this note is to show that Markov chains induced by non-singular triangular feedback shift registers and non-degenerate sources are rapidly mixing. The results may directly be applied to the post-processing of random generators and to stream ciphers in CFB mode.',
  category='foundations',
  keyWords='feedback shift registers, stream ciphers, Markov chains, rapid mixing',
  whenSubmitted='2005-1-12',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=10,
title='Update on SHA-1',
  authors='Vincent Rijmen and Elisabeth Oswald',
  abstract='We report on the experiments we performed in order to assess the
security of SHA-1 against the attack by Chabaud and Joux. We present some ideas for optimizations of the attack and some properties of the message expansion routine.
Finally, we show that for a reduced version of SHA-1, with 53
rounds instead of 80, it is possible to find collisions in less
than \$2^{80}\$ operations.',
  category='secret-key cryptography',
  keyWords='hash functions',
  whenSubmitted='2005-1-14',
  comments2chair='This version corrects some errors of the CT-RSA version.',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET  subId=11,
  title='An Improved Elegant Method to Re-initialize Hash Chains',
  authors='Yuanchao Zhao and Daoben Li',
  abstract='Hash chains are widely used in various cryptographic systems such as electronic micropayments and one-time passwords etc. However, hash chains suffer from the limitation that they have a finite number of links which when used up requires the system to re-initialize new hash chains. So system design has to reduce the overhead when hash chains are re-initialized. Recently, Vipul Goyal proposed an elegant one-time-signature-based method to re-initialize hash chains, in this efficient method an infinite number of finite length hash chains can be tied together so that hash chains can be securely re-initialized in a non-repudiable manner. Vipul Goyal¡¯s method is improved in this paper to reach a little more efficient method, which, more importantly, is a natural extension of the concept of conventional hash chains.',
  category='foundations',
  keyWords='hash chains',
  whenSubmitted='2005-1-18',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=12,
title='Efficient Certificateless Public Key Encryption',
  authors='Zhaohui Cheng and Richard Comley',
  abstract='In [3] Al-Riyami and Paterson introduced the notion of \"Certificateless Public Key Cryptography\" and presented an instantiation. In this paper, we revisit the formulation of certificateless public key encryption and construct a more efficient scheme and then extend it to an authenticated
encryption.',
  category='public-key cryptography',
  whenSubmitted='2005-1-19', lastModified='2005-6-6',
  comments2chair='Proofs appended',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=13,
title='Comments: Insider attack on Cheng et al.s pairing-based tripartite key agreement protocols',
  authors='Hung-Yu Chien',
  abstract='Recently, Cheng et al. proposed two tripartite key agreement protocols from pairings: one is certificate-based and the other is identity-based (ID-based). In this article, we show that the two schemes are vulnerable to the insider impersonation attack and the ID-based scheme even discloses the entities¡¦ private keys. Solutions to this problem are discussed.',
  category='cryptographic protocols',
  keyWords='elliptic curve cryptosystem, cryptanalysis, key escrow',
  whenSubmitted='2005-01-20',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=14,
title='A Chosen Ciphertext Attack on a Public Key Cryptosystem Based on Lyndon Words',
  authors='Ludovic Perret',
  abstract='In this paper, we present a chosen ciphertext attack against a 
public key cryptosysten based on Lyndon words \\cite{sm}. We show 
that, provided that an adversary has access to a decryption oracle, 
a key equivalent to the secret key can be constructed efficiently, 
i.e. in linear time.',
  category='public-key cryptography',
  keyWords='cryptanalysis, Lyndon words',
  whenSubmitted='2005-1-20',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=15,
title='Hierarchical Identity Based Encryption with Constant Size Ciphertext',
  authors='Dan Boneh and Xavier Boyen and Eu-Jin Goh',
  abstract='We present a Hierarchical Identity Based Encryption (HIBE) system
where the ciphertext consists of just three group elements and decryption
requires only two bilinear map computations, 
independent of the hierarchy depth.  Encryption is as efficient
as in other HIBE systems. We prove that the scheme is selective-ID secure
in the standard model and fully secure in the random oracle
model.  Our system has a number of applications: it gives very
efficient forward secure public key and identity based cryptosystems (where ciph
ertexts are
short), it converts the NNL broadcast encryption system into an
efficient public key broadcast system, and it provides an efficient
mechanism for encrypting to the future.  The system also supports
limited delegation where users can be given restricted private keys
that only allow delegation to certain descendants.  Sublinear size private
keys can also be achieved at the expense of some ciphertext expansion.
',
  category='public-key cryptography',
  keyWords='Identity Based Encryption',
  whenSubmitted='2005-1-20', lastModified='2005-1-20',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=16,
title='Narrow T-functions',
  authors='Magnus Daum',
  abstract='T-functions were introduced by Klimov and Shamir in a series of papers during the last few years. They are of great interest for cryptography as they may provide some new building blocks which can be used to construct efficient and secure schemes, for example block ciphers, stream ciphers or hash functions.
In the present paper, we define the narrowness of a T-function and study how this property affects the strength of a T-function as a cryptographic primitive.
We define a new data strucure, called a solution graph, that enables solving systems of equations given by T-functions. The efficiency of the algorithms which we propose for solution graphs depends significantly on the narrowness of the involved T-functions.
Thus the subclass of T-functions with small narrowness appears to be weak and should be avoided in cryptographic schemes.
Furthermore, we present some extensions to the methods of using solution graphs, which make it possible to apply these algorithms also to more general systems of equations, which may appear, for example, in the cryptanalysis of hash functions.
',
  keyWords='cryptanalysis, hash functions, solution graph, T-functions, \$w\$-narrow',
  whenSubmitted='2005-1-22', lastModified='2005-1-27',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=17,
title='Side Channel Attacks on Implementations of Curve-Based Cryptographic Primitives',
  authors='Roberto M. Avanzi',
  abstract='The present survey deals with the recent research in side channel
analysis and related attacks on implementations of cryptographic
primitives.  The focus is on software contermeasures for primitives
built around algebraic groups.  Many countermeasures are described,
together with their extent of applicability, and their weaknesses.
Some suggestions are made, conclusion are drawn, some directions for
future research are given.  An extensive bibliography on recent
developments concludes the survey.
',
  category='public-key cryptography',
  keyWords='elliptic curve cryptosystem, hyperelliptic curve cryptosystem, side-channel attacks, countermeasures',
  whenSubmitted='2005-1-23',
  comments2chair='This survey was originally written as a final report of the AREHCC project for the European Commission.',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=18,
title='Collusion Resistant Broadcast Encryption With Short Ciphertexts and Private Keys',
  authors='Dan Boneh and Craig Gentry  and Brent Waters',
  abstract='We describe two new public key broadcast encryption systems for
stateless receivers.  Both systems are fully secure against any number
of colluders. In our first construction both ciphertexts and private
keys are of constant size (only two group elements), for any
subset of receivers.  The public key size in this system is
linear in the total number of receivers.  Our second system is a
generalization of the first that provides a tradeoff between
ciphertext size and public key size.  For example, we achieve a
collusion resistant broadcast system for n users where both
ciphertexts and public keys are of size O(sqrt(n)) for any subset
of receivers.  We discuss several applications of these systems.
',
  category='public-key cryptography',
  whenSubmitted='2005-1-27', lastModified='2005-3-12',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=19,
title='The Full Abstraction of the UC Framework',
  authors='Jes{\\\\\\'u}s F. Almansa',
  abstract='We prove that security in the Universal Composability framework (UC) is equivalent to security in the probabilistic polynomial time calculus ppc. Security is defined under active and adaptive adversaries with synchronous and authenticated communication. In detail, we define an encoding from machines in UC to processes in ppc and show it is fully abstract with respect to UC-security and ppc-security, i.e., we show a protocol is UC-secure iff its encoding is ppc-secure. However, we restrict security in ppc to be quantified not over all possible contexts, but over those induced by UC-environments under encoding. This result is not overly-simplifying security in ppc, since the threat and communication models we assume are meaningful in both practice and theory.',
  category='foundations',
  keyWords='foundations, formal cryptographic analysis',
  whenSubmitted='2005-1-26',
  comments2chair='(DIMACS Title: A Notation for Multiparty Protocols of ITMs: Digging from the Tunnel\'s Other End)',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=20,
title='(De)Compositions of Cryptographic Schemes and their Applications to Protocols',
  authors='R. Janvier and Y. Lakhnech and L. Mazare',
  abstract='The main result of this paper is that the Dolev-Yao model is a safe abstraction of the computational model for security protocols including those that combine asymmetric and symmetric encryption, signature and hashing. Moreover, message forwarding and private key transmission are allowed. To our knowledge this is the first result that deals with hash functions and the combination of these cryptographic primitives. 

A key step towards this result is a general definition of correction of cryptographic primitives, that unifies well known correctness criteria such as IND-CPA, IND-CCA, unforgeability etc.... and a theorem that allows to reduce the correctness of a composition of two cryptographic schemes to the correctness of each one.',
  category='cryptographic protocols',
  keyWords='Security, Cryptographic Protocols, Formal Encryption, Probabilistic Encryption, Dolev-Yao Model, Computational Model',
  whenSubmitted='2005-1-14', lastModified='2005-6-10',
  comments2chair='This revision includes a new simplified proof of the reduction theorem.',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=21,
title='Partial Hiding in Public-Key Cryptography',
  authors='Eabhnat N\'{\\i} Fhloinn and Michael Purser',
  abstract='This paper explores the idea of partially exposing sections of the private key in public-key cryptosystems whose security is based on the intractability of factorising large integers.
It is proposed to allow significant portions of the private key to be publicly available, reducing the amount of data which must be securely hidden.
The \"secret\" data could be XORed with an individual\'s biometric reading in order to maintain a high level of security, and we suggest using iris templates for this purpose.
Finally, we propose an implementation of this system for RSA, and consider the potential risks and advantages associated with such a scheme.',
  category='public-key cryptography',
  keyWords='public-key cryptography, RSA, partial key exposure, partial hiding, iris, biometrics',
  whenSubmitted='2005-1-25', lastModified='2005-2-2',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=22,
title='An Improved and Efficient Countermeasure against Power Analysis Attacks',
  authors='ChangKyun Kim and JaeCheol Ha and SangJae Moon and Sung-Ming Yen and Wei-Chih Lien and  Sung-Hyun Kim',
  abstract='Recently new types of differential power analysis attacks (DPA)
against elliptic curve cryptosystems (ECC) and RSA systems have been
introduced. Most existing countermeasures against classical DPA
attacks are vulnerable to these new DPA attacks which include
refined power analysis attacks (RPA), zero-value point attacks
(ZPA), and doubling attacks. The new attacks are different from
classical DPA in that RPA uses a special point with a zero-value
coordinate, while ZPA uses auxiliary registers to locate a zero
value. So, Mamiya et al proposed a new countermeasure against RPA,
ZPA, classical DPA and SPA attacks using a basic random initial
point. His countermeasure works well when applied to ECC, but it has
some disadvantages when applied to general exponentiation algorithms
(such as RSA and ElGamal) due to an inverse computation. This paper
presents an efficient and improved countermeasure against the above
new DPA attacks by using a random blinding concept on the message
different from Mamiya\'s countermeasure and show that our proposed
countermeasure is secure against SPA based Yen\'s power analysis
which can break Coron\'s simple SPA countermeasure as well as
Mamiya\'s one. The computational cost of the proposed scheme is very
low when compared to the previous methods which rely on Coron\'s
simple SPA countermeasure. Moreover this scheme is a generalized
countermeasure which can be applied to ECC as well as RSA system.',
  keyWords='Side channel attack, DPA, RPA, ZPA, doubling attack, SPA, ECC, RSA',
  whenSubmitted='2005-1-25',
  comments2chair='The proposed countermeasure described in this paper was more efficient and secure than Mamiya\'s countermeasure(BRIP) of CHES 2004.',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=23,
title='A Construction of Public-Key Cryptosystem Using Algebraic Coding on the Basis of Superimposition and Randomness',
  authors='Masao Kasahara',
  abstract='In this paper, we present a new class of public-key cryptosystem (PKC) using algebraic coding on the basis of superimposition and randomness. The proposed PKC is featured by a generator matrix, in a characteristic form, where the generator matrix of an algebraic code is repeatedly used along with the generator matrix of a random code, as sub-matrices. This generator matrix, in the characteristic form, will be referred to as \$K\$-matrix. We show that the \$K\$-matrix yields the following advantages compared with the conventional schemes:
\\\\begin{description}
\\\\item [(i)] It realizes an abundant supply of PKCs, yielding more secure PKCs.
\\\\item [(i\\\\hspace{-.1em}i)] It realizes a fast encryption and decryption process.
\\end{description}',
  category='public-key cryptography',
  keyWords='algebraic coding, random coding, public-key cryptosystem
Publication Info. SCIS 2005 (The 2005 Symposium on Cryptography and Information Security)',
  whenSubmitted='2005-1-28',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=24,
title='On the Diffie-Hellman problem over \$GL_{n}\$',
  authors='A. A. Kalele and V. R. Sule',
  abstract='This paper considers the Diffie-Hellman problem (DHP) over the
matrix group \$\\gln\$ over finite fields and shows that for matrices
\$A\$ and exponents \$k\$, \$l\$ satisfying certain conditions called
the \\emph{modulus conditions}, the problem can be solved without
solving the discrete logarithm problem (DLP) involving only
polynomial number of operations in \$n\$. A specialization of this
result to DHP on \$\\fpm^*\$ shows that there exists a class of
session triples of a DH scheme for which the DHP can be solved in
time polynomial in \$m\$ by operations over \$\\fp\$ without solving
the DLP. The private keys of such triples are termed \\emph{weak}.
A sample of weak keys is computed and it is observed that their
number is not too insignificant to be ignored. Next a
specialization of the analysis is carried out for pairing based DH
schemes on supersingular elliptic curves and it is shown that for
an analogous class of session triples, the DHP can be solved
without solving the DLP in polynomial number of operations in the
embedding degree. A list of weak parameters of the DH scheme is
developed on the basis of this analysis.',
  category='public-key cryptography',
  keyWords='Diffie Hellman problem , pairing based Diffie Hellman key exchange',
  whenSubmitted='2005-1-27',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=25,
title='Analysis of Affinely Equivalent Boolean Functions',
  authors='Meng Qing-shu and Yang min and Zhang Huan-guo and Liu Yu-zhen',
  abstract='By walsh
transform, autocorrelation function, decomposition, derivation and
modification of truth table, some new invariants are obtained.
Based on invariant theory, we get two results: first a general
algorithm which can be used to judge if two boolean functions are
affinely equivalent and to obtain the affine equivalence
relationship if they are equivalent. For example, all 8-variable
homogenous bent functions of degree 3 are classified into 2
classes\", second, the classification of the Reed-Muller code
\$R(4,6)/R(1,6),R(3,7)/R(1,7),\$ which can be used to almost
enumeration of 8-variable bent functions.',
  category='foundations',
  keyWords='boolean functions,linearly equivalent, affine group',
  whenSubmitted='2005-30 Jan', lastModified='2005-27 Apr',
  comments2chair='a wrong word in title is corrected',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=26,
title='Techniques for random maskin in hardware',
  authors='Jovan Dj. Golic',
  abstract='A new technique for Boolean random masking of the logic AND operation in terms of NAND logic gates
is presented and its potential for masking arbitrary cryptographic functions is pointed out. 
The new technique is much more efficient than a previously known technique, recently applied to AES. 
It is also applied for masking the integer addition. 
In addition, new techniques for the conversions from Boolean to arithmetic random masking and vice versa
are developed. They are hardware oriented and do not require additional random bits. 
Unlike the previous, software-oriented techniques showing a substantial difference in the complexity
of the two conversions, they have a comparable complexity being about the same as that
of one integer addition only. 
All the techniques proposed are in theory secure against the first-order differential
power analysis on the logic gate level. 
They can be applied in hardware implementations of various cryptographic functions,
including AES, (keyed) SHA-1, IDEA, and RC6.',
  category='implementation',
  keyWords='power analysis, random masking, logic circuits',
  whenSubmitted='2005-2 Feb',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=27,
title='Tag-KEM/DEM: A New Framework for Hybrid Encryption',
  authors='Masayuki ABE and Rosario Gennaro and Kaoru Kurosawa',
  abstract='This paper presents a novel framework for generic construction of hybrid encryption schemes which produces more efficient schemes than before.  A known framework introduced by Shoup combines a key encapsulation mechanism (KEM) and a data encryption mechanism (DEM). While it is believed that both of the components must be secure against chosen ciphertext attacks, Kurosawa and Desmedt showed a particular example of KEM that might not be CCA but can be securely combined with CCA DEM yielding more efficient hybrid encryption scheme.  There are also many efficient hybrid encryption schemes in various settings that do not fit to the framework.  These facts serve as motivation to seek another framework that yields more efficient schemes.

In addition to the potential efficiency of the resulting schemes, our
framework will provide insightful explanation about existing schemes
that do not fit to the previous framework.  This could result in finding improvements for some schemes.  Moreover, it allows immediate conversion from a class of threshold public-key encryption to a hybrid one without considerable overhead, which is not possible in the previous approach.
',
  category='public-key cryptography',
  keyWords='hybrid encryption',
  whenSubmitted='2005-3 Feb',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=28,
title='Improved Proxy Re-Encryption Schemes with Applications to Secure Distributed Storage',
  authors='Giuseppe Ateniese and Kevin Fu and Matthew Green and Susan Hohenberger',
  abstract='In 1998, Blaze, Bleumer, and Strauss (BBS) proposed an application called
atomic proxy re-encryption, in which a semi-trusted proxy
converts a ciphertext for Alice into a ciphertext for Bob without 
seeing the underlying plaintext.  We predict that fast and
secure re-encryption will become increasingly popular as a method for
managing encrypted file systems.  Although efficiently computable, the
wide-spread adoption of BBS re-encryption has been hindered by
considerable security risks.  Following recent work of Ivan and Dodis,
we present new re-encryption schemes that realize a stronger notion of
security and we demonstrate the usefulness of proxy re-encryption as a
method of adding access control to the SFS read-only file system.
Performance measurements of our experimental file system demonstrate
that proxy re-encryption can work effectively in practice.',
  whenSubmitted='2005-3 Feb',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=29,
title='A model and architecture for pseudo-random generation with applications to /dev/random',
  authors='Boaz Barak and Shai Halevi',
  abstract='We present a formal model and a simple architecture for robust pseudorandom generation that ensures resilience in the face of an
observer with partial knowledge/control of the generator\'s entropy source. Our model and architecture have the following properties:


1 Resilience:  The generator\'s output looks random to an observer with no knowledge of the internal state. This holds even if that observer has complete control over data that is used to refresh the internal state.

2 Forward security: Past output of the generator looks random to an observer, even if the observer learns the internal state at a later time.

3 Backward security/Break-in recovery: Future output of the generator looks random, even to an observer with knowledge of the current state, provided that the generator is refreshed with data of sufficient entropy.


Architectures such as above were suggested before. This work differs
from previous attempts in that we present a formal model for robust
pseudo-random generation, and provide a formal proof within this model
for the security of our architecture. To our knowledge, this is the
first attempt at a rigorous model for this problem.

Our formal modeling advocates the separation of the *entropy extraction* phase from the *output generation* phase. We argue that the former is information-theoretic in nature, and could therefore rely on combinatorial and statistical tools rather than on cryptography. On the other hand, we show that the latter can be implemented using any standard (non-robust) cryptographic PRG.

We also discuss the applicability of our architecture for applications such as /dev/(u)random in Linux and pseudorandom generation on smartcards.
',
  keyWords='/dev/random, Entropy, Mixing functions,Pseudo-randomness, Smart-cards, True randomness.',
  whenSubmitted='2005-5 Feb', lastModified='2005-1 Sep',
  comments2chair='Minor revision',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=30,
title='Weak keys of pairing based Diffie Hellman schemes on elliptic curves',
  authors='A. A. Kalele and V. R. Sule',
  abstract='This paper develops a cryptanalysis of the pairing based Diffie
Hellman (DH) key exchange schemes an instance of which is the
triparty single round key exchange proposed in \\cite{joux}. The
analysis of \\emph{weak sessions} of the standard DH scheme
proposed in \\cite{kasu} is applied to show existence of weak
sessions for such schemes over supersingular curves. It is shown
that for such sessions the associated Bilinear Diffie Hellman
Problem is solvable in polynomial time, without computing the
private keys i.e. without solving the discrete logarithms. Other
applications of the analysis to Decisional Diffie Hellman Problem
and the identitiy based DH scheme are also shown to hold. The
triparty key exchange scheme is analyzed for illustration and it
is shown that the number of weak keys increases in this scheme as
compared to the standard two party DH scheme. It is shown that the
random choice of private keys by the users independent of each
other\'s knowledge is insecure in these schemes. Algorithms are
suggested for checking weakness of private keys based on an order
of selection.',
  category='public-key cryptography',
  keyWords='Bilinear Diffie-Hellman problem, Triparty key exchange',
  whenSubmitted='2005-7 Feb', lastModified='2005-10 Feb',
  comments2chair='Submitting the revised copy as we found a mistake in references.',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=31,
title='The Vector Decomposition Problem for Elliptic and Hyperelliptic Curves',
  authors='Iwan Duursma and Negar Kiyavash',
  abstract='The group of m-torsion points on an elliptic curve, for a prime
number m, forms a two-dimensional vector space. It was suggested
and proven by Yoshida that under certain conditions the vector
decomposition problem (VDP) on a two-dimensional vector space is
at least as hard as the computational Diffie-Hellman problem
(CDHP) on a one-dimensional subspace. In this work we show that
even though this assessment is true, it applies to the VDP for
m-torsion points on an elliptic curve only if the curve is
supersingular. But in that case the CDHP on the one-dimensional
subspace has a known sub-exponential solution. Furthermore, we
present a family of hyperelliptic curves of genus two that are
suitable for the VDP.',
  category='public-key cryptography',
  keyWords='Elliptic curve cryptography, Curves of genus two',
  whenSubmitted='2005-7 Feb',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=32, 
  title='On the Notion of Statistical Security in Simulatability Definitions',
  authors='Dennis Hofheinz and Dominique Unruh',
  abstract='  We investigate the definition of statistical security (i.e.,
  security against unbounded adversaries) in the framework of reactive
  simulatability. This framework allows to formulate and analyze
  multi-party protocols modularly by providing a composition theorem
  for protocols. However, we show that the notion of statistical
  security, as defined by Backes, Pfitzmann and Waidner for the
  reactive simulatability framework, does not allow for secure
  composition of protocols. This in particular invalidates the proof
  of the composition theorem.

  We give evidence that the reason for the non-composability of
  statistical security is no artifact of the framework itself, but of
  the particular formulation of statistical security. Therefore, we
  give a modified notion of statistical security in the reactive
  simulatability framework. We prove that this notion allows for
  secure composition of protocols.

  As to the best of our knowledge, no formal definition of statistical
  security has been fixed for Canetti\'s universal composability
  framework, we believe that our observations and results can also
  help to avoid potential pitfalls there.
',
  category='cryptographic protocols',
  keyWords='Reactive simulatability, universal composability, statistical security, protocol composition',
  whenSubmitted='2005-7 Feb',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=33,
title='A Flexible Framework for Secret Handshakes',
  authors='Gene Tsudik and Shouhuai Xu',
  abstract='In the society increasingly concerned with the erosion of privacy,
privacy-preserving techniques are becoming very important.
Secret handshakes offer anonymous and unobservable authentication 
and serve as an important tool in the arsenal of privacy-preserving 
techniques. Relevant prior research focused on 2-party secret 
handshakes with one-time credentials, whereby two parties establish 
a secure, anonymous and unobservable communication channel only if 
they are members of the same group. 

This paper breaks new ground on two accounts: (1) it shows how 
to obtain secure and efficient secret handshakes with reusable 
credentials, and (2) it provides the first treatment of multi-party
secret handshakes, whereby m>=2 parties establish a secure, 
anonymous and unobservable communication channel only if they all
belong to the same group. An interesting new issue encountered 
in multi-party secret handshakes is the need to ensure that all
parties are distinct. (This is a real challenge since the 
parties cannot expose their identities.) We tackle this and 
other challenging issues in constructing GCD -- a flexible secret 
handshake framework. \\GCD\\ can be viewed as a compiler that 
transforms three main building blocks: (1) a Group signature scheme, 
(2) a Centralized group key distribution scheme, and (3) a 
Distributed group key agreement scheme, into a secure 
multi-party secret handshake scheme.

The proposed framework lends itself to multiple practical 
instantiations, and offers several novel and appealing features 
such as self-distinction and strong anonymity with reusable
credentials. In addition to describing the motivation and 
step-by-step construction of the framework, this paper provides 
a security analysis and illustrates several concrete framework 
instantiations.',
  category='cryptographic protocols',
  keyWords='secret handshakes, privacy-preservation, anonymity, credential systems, unobservability, unlinkability, key management',
  whenSubmitted='2005-8 Feb',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=34,
title='An Efficient CDH-based Signature Scheme With a Tight Security Reduction',
  authors='Benoit Chevallier-Mames',
  abstract='At Eurocrypt 03, Goh and Jarecki showed that, contrary to other 
signature schemes in the discrete-log setting, the EDL signature 
scheme has a tight security reduction, namely to the 
Computational Diffie-Hellman (CDH) problem, in the Random Oracle 
(RO) model.  They also remarked that EDL can be turned into an 
off-line/on-line signature scheme using the technique of Shamir 
and Tauman, based on chameleon hash functions.

In this paper, we propose a new signature scheme that also has a 
tight security reduction to CDH but whose resulting signatures 
are smaller than EDL signatures.  Further, similarly to the 
Schnorr signature scheme (but contrary to EDL), our signature is 
naturally efficient on-line: no additional trick is needed for 
the off-line phase and the verification process is unchanged.

For example, in elliptic curve groups, our scheme results in a 
25% improvement on the state-of-the-art discrete-log based 
schemes, with the same security level.  This represents to date 
the most efficient scheme of any signature scheme with a tight 
security reduction in the discrete-log setting.',
  keyWords='signature schemes, discrete logarithm problem, Diffie-Hellman problem, EDL',
  whenSubmitted='2005-10 Feb', lastModified='2005-30 May',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=35,
title='Concurrent Composition of Secure Protocols in the Timing Model',
  authors='Yael Kalai and Yehuda Lindell and Manoj Prabhakaran',
  abstract='In the setting of secure multiparty computation, a set of mutually
distrustful parties wish to securely compute some joint function
of their inputs. In the stand-alone case, it has been shown that
{\\em every} efficient function can be securely computed.
However, in the setting of concurrent composition, broad
impossibility results have been proven for the case of no honest
majority and no trusted setup phase. These results hold both for
the case of general composition (where a secure protocol is run
many times concurrently with arbitrary other protocols) and self
composition (where a single secure protocol is run many times
concurrently).

In this paper, we investigate the feasibility of obtaining
security in the concurrent setting, assuming that each party has a
local clock and that these clocks proceed at approximately the
same rate. We show that under this mild timing assumption, it is
possible to securely compute {\\em any} multiparty functionality
under concurrent \\emph{self} composition. We also show that it
is possible to securely compute {\\em any} multiparty
functionality under concurrent {\\em general} composition, as
long as the secure protocol is run only with protocols whose
messages are delayed by a specified amount of time. On the
negative side, we show that it is impossible to achieve security
under concurrent general composition with no restrictions
whatsoever on the network (like the aforementioned delays), even
in the timing model.',
  category='cryptographic protocols',
  keyWords='multiparty computation, concurrent general composition, timing model',
  whenSubmitted='2005-10 Feb', lastModified='2005-28 Jul',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=36,
title='Improving Secure Server Performance by Re-balancing SSL/TLS Handshakes',
  authors='Claude Castelluccia and Einar Mykletun and Gene Tsudik',
  abstract='Much of today\'s distributed computing takes place in a client/server model.
Despite advances in fault tolerance -- in particular, replication and load
distribution -- server overload remains to be
a major problem. In the Web context, one of the main overload factors is the
direct consequence of expensive Public Key operations performed by servers
as part of each SSL handshake. Since most SSL-enabled servers use RSA,
the burden of performing many costly decryption operations can be
very detrimental to server performance. This paper examines a
promising technique for re-balancing RSA-based client/server
handshakes. This technique facilitates more favorable load distribution
by requiring clients to perform more work (as part of encryption) and
servers to perform commensurately less work, thus resulting in better
SSL throughput.  Proposed techniques are based on careful adaptation of
variants of Server-Aided RSA originally constructed by
Matsumoto, et al. Experimental results demonstrate that
suggested methods (termed Client-Aided RSA) can speed up processing
by a factor of between 11 to 19, depending on the RSA key size. This represents
a considerable improvement. Furthermore, proposed techniques can be a useful
companion tool for SSL Client Puzzles in defense against DoS and DDoS attacks.',
  category='public-key cryptography',
  keyWords='SSL, RSA, Client-aided',
  whenSubmitted='2005-10 Feb', lastModified='2005-8 Apr',
  comments2chair='Contrary to \"popular belief\", our proposed solution is not subject to the 
meet-in-the-middle attack proposed in private communication with David Wagner.',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=37,
title='Distinguishing Stream Ciphers with Convolutional Filters',
  authors='Joan Daemen and Gilles Van Assche',
  abstract='This paper presents a new type of distinguisher for the shrinking generator and the alternating-step generator with known feedback polynomial and for the multiplexor generator. For the former the distinguisher is more efficient than existing ones and for the latter it results in a complete breakdown of security. The distinguisher is conceptually very simple and lends itself to theoretical analysis leading to reliable predictions of its probability of success.
',
  category='secret-key cryptography',
  keyWords='Stream ciphers, cryptanalysis',
  whenSubmitted='2005-15 Feb',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=38,
title='Unfairness of a protocol for certified delivery',
  authors='Juan M. Estevez-Tapiador and Almudena Alcaide',
  abstract='Recently, Nenadi\'c \\emph{et al.} (2004) proposed the RSA-CEGD
protocol for certified delivery of e-goods. This is a relatively
complex scheme based on verifiable and recoverable encrypted
signatures (VRES) to guarantee properties such as strong fairness
and non-repudiation, among others. In this paper, we demonstrate how
this protocol cannot achieve fairness by presenting a severe attack
and also pointing out some other weaknesses.',
  category='cryptographic protocols',
  keyWords='fair exchange, non-repudiation, attacks',
  whenSubmitted='2005-15 Feb', lastModified='2005-16 Feb',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=39,
title='On the Security of a Group Signature Scheme with Strong Separability',
  authors='Lihua Liu and Zhengjun Cao',
  abstract='A group signature scheme allows a
      group member of a given group to sign messages on behalf of
      the group in an anonymous and unlinkable fashion. In case of
      a dispute, however, a designated group manager can reveal
      the signer of a valid group signature. Many applications of
      group signatures require that the group manager can be split
      into a membership manager and a revocation manager. Such a
      group signature scheme with strong separability was proposed
      in paper [1]. Unfortunately, the scheme is insecure which has   been shown in [2][3][4]. In this  paper
 we show that the scheme  is untraceable by a simple and direct attack.  Besides, we show its universal forgeability by a
       general attack which only needs to choose five random numbers.
        We minutely explain the technique to shun the challenge in
       the scheme.',
  category='cryptographic protocols',
  keyWords='Group signature, Untraceability,Universal forgeability.',
  whenSubmitted='2005-15 Feb',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=40,
  title='Polyhedrons over Finite Abelian Groups and Their Cryptographic Applications',
  authors='Logachev~O.A. and Salnikov~A.A. and Yaschenko~V.V.',
  abstract='We are using the group-theory methods for justification of
algebraic method in cryptanalysis. The obtained results are using
for investigation of  Boolean functions cryptographic properties.',
  category='secret-key cryptography',
  keyWords='boolean functions, cryptanalisis, discrete functions',
  whenSubmitted='2005-16 Feb',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=41,
title='An Efficient Solution to The Millionaires Problem Based on Homomorphic Encryption',
  authors='Hsiao-Ying Lin and Wen-Guey Tzeng',
  abstract='We proposed a two-round protocol for solving the
 Millionaires Problem in the setting of semi-honest
 parties.
Our protocol uses either multiplicative or additive
 homomorphic encryptions.
Previously proposed protocols used additive or XOR
 homomorphic encryption schemes only.
The computation and communication costs of our protocol
 are in the same asymptotic order as those of
 the other efficient protocols.
Nevertheless, since multiplicative homomorphic encryption
 scheme is more efficient than an additive one practically,
 our construction saves computation time and communication
 bandwidth in practicality.
In comparison with the most efficient previous solution, our
 protocol saves 89% computation time and 25% communication bits.',
  keyWords='secure computation, the greater than problem',
  whenSubmitted='2005-17 Feb',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=42,
title='On the affine classification of cubic bent functions',
  authors='Sergey Agievich',
  abstract='We consider cubic boolean bent functions, each cubic monomial of which contains the same variable. We investigate canonical forms of these functions under affine transformations of variables.
In particular, we refine the affine classification of cubic bent functions of 8 variables.
',
  category='secret-key cryptography',
  keyWords='boolean functions, bent functions',
  whenSubmitted='2005-17 Feb',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=43,
title='Choosing Parameter Sets for NTRUEncrypt with NAEP and SVES-3',
  authors='Nick Howgrave-Graham and Joseph H. Silverman and William Whyte',
  abstract='We present, for the first time, an algorithm to choose parameter sets for NTRUEncrypt that give a desired level of security.

Note: This is an expanded version of a paper presented at CT-RSA 2005.',
  category='public-key cryptography',
  keyWords='encryption, ntru, lattice techniques',
  whenSubmitted='2005-17 Feb',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=44,
title='New Approaches for Deniable Authentication',
  authors='Mario Di Raimondo and Rosario Gennaro',
  abstract='Deniable Authentication protocols allow a Sender to authenticate a
message for a Receiver, in a way that the Receiver cannot convince
a third party that such authentication (or any authentication) ever
took place.

We point out a subtle definitional issue for deniability. In particular
we propose the notion of {\\em forward deniability}, which requires that
the authentications remain deniable even if the {\\em Sender} wants to later
prove that she authenticated a message. We show that generic
results where deniability is obtained by reduction to a computational
zero-knowledge protocol for an NP-complete language
do not achieve forward deniability.

We then present two new approaches to the problem of deniable authentication.
On the theoretical side, the novelty of our schemes is that they
do not require the use of CCA-secure encryption (all previous known solutions
did), thus showing a different generic approach to the problem of
deniable authentication. On the practical side, these new approaches lead
to more efficient protocols. As an added bonus, our
protocols are forward deniable.',
  category='cryptographic protocols',
  keyWords='Authentication, Deniability, Zero-Knowledge, Concurrency',
  whenSubmitted='2005-19 Feb',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=45,
title='Cryptanalysis of an anonymous wireless authentication and conference key distribution scheme',
  authors='Qiang Tang and Chris J. Mitchell',
  abstract='In this paper we analyse an anonymous wireless authentication and
conference key distribution scheme which is also designed to
provide mobile participants with user identification privacy
during the conference call. The proposed scheme consists of three
sub-protocols: the Call Set-Up Authentication Protocol, the
Hand-Off Authentication Protocol, and the Anonymous Conference
Call Protocol. We show that the proposed scheme suffers from a
number of security vulnerabilities.',
  category='cryptographic protocols',
  keyWords='wireless authentication, key agreement',
  whenSubmitted='2005-19 Feb',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=46,
title='Cryptanalysis of two identification schemes based on an ID-based cryptosystem',
  authors='Qiang Tang and Chris J. Mitchell',
  abstract='Two identification schemes based on the Maurer-Yacobi ID-based
cryptosystem are analysed and shown to suffer from serious
security problems.',
  category='cryptographic protocols',
  keyWords='identification scheme Identity-based cryptosystem',
  whenSubmitted='2005-20 Feb',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=47,
title='Adversarial Model for Radio Frequency Identification',
  authors='Gildas Avoine',
  abstract='Radio Frequency Identification (RFID) systems aim to identify objects in open environments with neither physical nor visual contact. They consist of transponders inserted into objects, of readers, and usually of a database which contains information about the objects. The key point is that authorised readers must be able to identify tags without an adversary being able to trace them. Traceability is often underestimated by advocates of the technology and sometimes exaggerated by its detractors. Whatever the true picture, this problem is a reality when it blocks the deployment of this technology and some companies, faced with being boycotted, have already abandoned its use. Using cryptographic primitives to thwart the traceability issues is an approach which has been explored for several years. However, the research carried out up to now has not provided satisfactory results as no universal formalism has been defined. 
In this paper, we propose an adversarial model suitable for RFID environments. We define the notions of existential and universal untraceability and we model the access to the communication channels from a set of oracles. We show that our formalisation fits the problem being considered and allows a formal analysis of the protocols in terms of traceability. We use our model on several well-known RFID protocols and we show that most of them have weaknesses and are vulnerable to traceability.',
  keyWords='RFID, Adversarial Model, Privacy, Untraceability, Cryptanalysis',
  whenSubmitted='2005-20 Feb',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=48,
title='David Chaum\'s Voter Verification using Encrypted Paper Receipts',
  authors='Poorvi L. Vora',
  abstract='In this document, we provide an exposition of David Chaum\'s voter
verification method that uses encrypted paper receipts. This
document provides simply an exposition of the protocol, and does
not address any of the proofs covered in Chaum\'s papers.',
  category='cryptographic protocols',
  keyWords='election schemes',
  whenSubmitted='2005-20 Feb',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=49,
title='A Note on Shor\'s Quantum  Algorithm for Prime Factorization',
  authors='Zhengjun Cao',
  abstract='It\'s well known that  Shor[1]  proposed a
polynomial time algorithm for prime factorization by using quantum
computers. For a given number \$n\$, he gave an algorithm for
finding the order \$r\$ of an element \$x\$  (mod \$n\$) instead of giving an  algorithm for factoring \$n\$ directly. The indirect
algorithm is feasible  because   factorization can be reduced to
finding the order of an element by using randomization[2]. But a
point should be stressed that the order of the number must be
even. Actually, the restriction can be removed in a particular
case. In this paper, we show that factoring RSA modulus (a product
of two primes)  only needs to find the order of \$2\$, whether it is
even or not.',
  category='foundations',
  keyWords=' Shor\'s quantum algorithm, RSA modulus.',
  whenSubmitted='2005-18 Feb',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=50,
title='Picking Virtual Pockets using Relay Attacks on Contactless Smartcard Systems',
  authors='Ziv Kfir and Avishai Wool',
  abstract='A contactless smartcard is a smartcard that can communicate with other
devices without any physical connection, using Radio-Frequency
Identifier (RFID) technology. Contactless smartcards are becoming
increasingly popular, with applications like credit-cards,
national-ID, passports, physical access. The security of such
applications is clearly critical. A key feature of RFID-based systems
is their very short range: typical systems are designed to operate at
a range of ~10cm. In this study we show that contactless
smartcard technology is vulnerable to relay attacks: An attacker can
trick the reader into communicating with a victim smartcard that is
very far away. A \"low-tech\" attacker can build a pick-pocket system
that can remotely use a victim contactless smartcard, without the
victim\'s knowledge. The attack system consists of two devices, which
we call the \"ghost\" and the \"leech\". We discuss basic designs for
the attacker\'s equipment, and explore their possible operating
ranges. We show that the ghost can be up to 50m away from the card
reader---3 orders of magnitude higher than the nominal range. We also
show that the leech can be up to 50cm away from the the victim
card. The main characteristics of the attack are: orthogonality to any
security protocol, unlimited distance between the attacker and the
victim, and low cost of the attack system.',
  category='applications',
  keyWords='RFID',
  whenSubmitted='2005-22 Feb',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=51,
  title='An Approach Towards Rebalanced RSA-CRT with Short Public Exponent',
  authors='Hung-Min Sun and Mu-En Wu',
  abstract='Based on the Chinese Remainder Theorem (CRT), Quisquater and Couvreur proposed an RSA variant, RSA-CRT, to speedup RSA decryption. According to RSA-CRT, Wiener suggested another RSA variant, Rebalanced RSA-CRT, to further speedup RSA-CRT decryption by shifting decryption cost to encryption cost. However, such an approach will make RSA encryption very time-consuming because the public exponent e in Rebalanced RSA-CRT will be of the same order of magnitude as £p(N). In this paper we study the following problem: does there exist any secure variant of Rebalanced RSA-CRT, whose public exponent e is much shorter than £p(N)? We solve this problem by designing a variant of Rebalanced RSA-CRT with d_{p} and d_{q} of 198 bits. This variant has the public exponent e=2^511+1 such that its encryption is about 3 times faster than that of the original Rebalanced RSA-CRT.',
  category='public-key cryptography',
  whenSubmitted='2005-22 Feb',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=52,
  title='Comment on cryptanalysis of Tseng et al. authenticated encryption schemes',
  authors='Yi-Hwa Chen and Jinn-Ke Jan',
  abstract='Recently, Xie and Yu proposed a forgery attack on the Tseng et al¡¦s authenticated encryption schemes and showed that their schemes are not secure in two cases: the specified verifier substitutes his secret key, or the signer generates the signature with these schemes for two or more specified verifiers. In addition, Xie and Yu made a small modification for the Tseng et al¡¦s schemes and claimed that the modified schemes can satisfy the security requirement. However, we show that the modified schemes are still insecure.',
  category='public-key cryptography',
  keyWords='Cryptography, Authenticated encryption, Message linkage, Self-certificated public key',
  whenSubmitted='2005-22 Feb', lastModified='2005-18 Mar',
  status='Withdrawn',
  comments2chair='Revise the title again.',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=53,
  title='Untraceability of Two Group Signature Schemes',
  authors='Zhengjun Cao',
  abstract='A group signature scheme allows a
      group member of a given group to sign messages on behalf of
      the group in an anonymous  fashion. In case of
      a dispute, however, a designated group manager can reveal
      the signer of a valid group signature.  In the paper, we
      show the untraceability of two group signatures in [1, 5] by  new and  very simple attacks.
       Although those flaws,  such as, forgeability,
       untraceability and linkability   have been shown in [2, 7, 8, 9],  we should point out that our attacks are more simple.',
  category='cryptographic protocols',
  keyWords='Group signature, Untraceability.',
  whenSubmitted='2005-23 Feb',
  contact='some-email@address.edu',
  format='txt'",

"INSERT INTO submissions SET subId=54, 
  title='Key Derivation and Randomness Extraction',
  authors='Olivier Chevassut and Pierre-Alain Fouque and Pierrick Gaudry and David Pointcheval',
  abstract='Key derivation refers to the process by which an agreed upon large
random number, often named master secret, is used to derive keys to
encrypt and authenticate data. Practitioners and standardization 
bodies have usually used the random oracle model to get key material
from a Diffie-Hellman key exchange. However, proofs in the standard model 
require randomness extractors to formally extract the entropy of the 
random master secret into a seed prior to derive other keys.

This paper first deals with the protocol \$\\Sigma_0\$, in which the key
derivation phase is (deliberately) omitted, and security inaccuracies
in the analysis and design of the Internet Key Exchange 
(IKE version 1) protocol, corrected in IKEv2. 
They do not endanger the practical use of IKEv1, since the security
could be proved, at least, in the random oracle model. 
However, in the standard model, there is not yet any formal global security 
proof, but just separated analyses which do not fit together well.
The first simplification is common in the theoretical security analysis
of several key exchange protocols, whereas the key derivation phase is a 
crucial step for theoretical reasons, but also practical purpose, and
requires careful analysis. The second problem is a gap between the
recent theoretical analysis of HMAC as a good randomness extractor
(functions keyed with public but random elements) and its practical
use in IKEv1 (the key may not be totally random, because of the lack
of clear authentication of the nonces). 
Since the latter problem comes from the probabilistic property of this 
extractor, we thereafter review some \\textit{deterministic} 
randomness extractors and suggest the \\emph{Twist-AUgmented} 
technique, a new extraction method quite well-suited for
Diffie-Hellman-like scenarios.',
  category='cryptographic protocols',
  keyWords='Key exchange, Randomness extractors, Key derivation',
  whenSubmitted='2005-25 Feb', lastModified='2005-3-19',
  contact='some-email@address.edu',
  format='pdf'",

"UPDATE submissions SET subPwd=subId",

"INSERT INTO committee SET name='David Beckham', revPwd='', email='rev1'",
"INSERT INTO committee SET name='Fabio Cannavaro', revPwd='', email='rev2'",
"INSERT INTO committee SET name='Angelos Charisteas', revPwd='', email='rev3'",
"INSERT INTO committee SET name='Joy Fawcett', revPwd='', email='rev4'",
"INSERT INTO committee SET name='Danielle Fotopoulos', revPwd='', email='rev5'",
"INSERT INTO committee SET name='Julie Foudy', revPwd='', email='rev6'",
"INSERT INTO committee SET name='Stylianos Giannakopoulos', revPwd='', email='rev7'",
"INSERT INTO committee SET name='Mia Hamm', revPwd='', email='rev8'",
"INSERT INTO committee SET name='Devvyn Hawkins', revPwd='', email='rev9'",
"INSERT INTO committee SET name='Angela Hucles', revPwd='', email='rev10'",
"INSERT INTO committee SET name='Jena Kluegel', revPwd='', email='rev11'",
"INSERT INTO committee SET name='Amy LePeilbet', revPwd='', email='rev12'",
"INSERT INTO committee SET name='Paolo Maldini', revPwd='', email='rev13'",
"INSERT INTO committee SET name='Antonios Nikopolidis', revPwd='', email='rev14'",
"INSERT INTO committee SET name='Michael Owen', revPwd='', email='rev15'",
"INSERT INTO committee SET name='Francesco Totti', revPwd='', email='rev16'",
"INSERT INTO committee SET name='Zinedine Zidane', revPwd='', email='rev17'",

"INSERT INTO assignments SET subId=1, revId=2, pref=2, compatible=0",
"INSERT INTO assignments SET subId=1, revId=3, pref=3, compatible=0",
"INSERT INTO assignments SET subId=1, revId=4, pref=3, compatible=0",
"INSERT INTO assignments SET subId=1, revId=5, pref=2, compatible=0",
"INSERT INTO assignments SET subId=1, revId=8, pref=2, compatible=0",
"INSERT INTO assignments SET subId=1, revId=9, pref=3, compatible=0",
"INSERT INTO assignments SET subId=1, revId=10, pref=1, compatible=0",
"INSERT INTO assignments SET subId=1, revId=11, pref=1, compatible=0",
"INSERT INTO assignments SET subId=1, revId=12, pref=3, compatible=0",
"INSERT INTO assignments SET subId=1, revId=13, pref=2, compatible=0",
"INSERT INTO assignments SET subId=1, revId=14, pref=2, compatible=0",
"INSERT INTO assignments SET subId=1, revId=15, pref=4, compatible=0",
"INSERT INTO assignments SET subId=1, revId=16, pref=5, compatible=0",
"INSERT INTO assignments SET subId=1, revId=17, pref=1, compatible=0",
"INSERT INTO assignments SET subId=1, revId=18, pref=2, compatible=0",
"INSERT INTO assignments SET subId=2, revId=10, pref=3, compatible=0",
"INSERT INTO assignments SET subId=2, revId=12, pref=5, compatible=0",
"INSERT INTO assignments SET subId=2, revId=13, pref=1, compatible=0",
"INSERT INTO assignments SET subId=2, revId=14, pref=4, compatible=0",
"INSERT INTO assignments SET subId=2, revId=2, pref=2, compatible=0",
"INSERT INTO assignments SET subId=2, revId=4, pref=4, compatible=0",
"INSERT INTO assignments SET subId=2, revId=6, pref=4, compatible=0",
"INSERT INTO assignments SET subId=2, revId=7, pref=3, compatible=0",
"INSERT INTO assignments SET subId=2, revId=9, pref=1, compatible=0",
"INSERT INTO assignments SET subId=3, revId=10, pref=2, compatible=0",
"INSERT INTO assignments SET subId=3, revId=13, pref=3, compatible=0",
"INSERT INTO assignments SET subId=3, revId=15, pref=1, compatible=0",
"INSERT INTO assignments SET subId=3, revId=16, pref=4, compatible=0",
"INSERT INTO assignments SET subId=3, revId=17, pref=1, compatible=0",
"INSERT INTO assignments SET subId=3, revId=18, pref=1, compatible=0",
"INSERT INTO assignments SET subId=3, revId=3, pref=2, compatible=0",
"INSERT INTO assignments SET subId=3, revId=5, pref=4, compatible=0",
"INSERT INTO assignments SET subId=3, revId=6, pref=4, compatible=0",
"INSERT INTO assignments SET subId=3, revId=7, pref=4, compatible=0",
"INSERT INTO assignments SET subId=3, revId=9, pref=1, compatible=0",
"INSERT INTO assignments SET subId=4, revId=10, pref=4, compatible=0",
"INSERT INTO assignments SET subId=4, revId=11, pref=0, compatible=0",
"INSERT INTO assignments SET subId=4, revId=12, pref=3, compatible=0",
"INSERT INTO assignments SET subId=4, revId=13, pref=1, compatible=0",
"INSERT INTO assignments SET subId=4, revId=14, pref=2, compatible=0",
"INSERT INTO assignments SET subId=4, revId=15, pref=1, compatible=0",
"INSERT INTO assignments SET subId=4, revId=16, pref=3, compatible=-1",
"INSERT INTO assignments SET subId=4, revId=17, pref=3, compatible=0",
"INSERT INTO assignments SET subId=4, revId=2, pref=2, compatible=0",
"INSERT INTO assignments SET subId=4, revId=18, pref=3, compatible=0",
"INSERT INTO assignments SET subId=4, revId=3, pref=2, compatible=0",
"INSERT INTO assignments SET subId=4, revId=4, pref=3, compatible=1",
"INSERT INTO assignments SET subId=4, revId=7, pref=3, compatible=0",
"INSERT INTO assignments SET subId=4, revId=8, pref=4, compatible=0",
"INSERT INTO assignments SET subId=4, revId=9, pref=2, compatible=0",
"INSERT INTO assignments SET subId=5, revId=10, pref=3, compatible=0",
"INSERT INTO assignments SET subId=5, revId=11, pref=3, compatible=0",
"INSERT INTO assignments SET subId=5, revId=12, pref=2, compatible=0",
"INSERT INTO assignments SET subId=5, revId=13, pref=3, compatible=0",
"INSERT INTO assignments SET subId=5, revId=14, pref=1, compatible=0",
"INSERT INTO assignments SET subId=5, revId=15, pref=5, compatible=0",
"INSERT INTO assignments SET subId=5, revId=16, pref=1, compatible=0",
"INSERT INTO assignments SET subId=5, revId=17, pref=4, compatible=0",
"INSERT INTO assignments SET subId=5, revId=2, pref=3, compatible=0",
"INSERT INTO assignments SET subId=5, revId=18, pref=5, compatible=0",
"INSERT INTO assignments SET subId=5, revId=3, pref=2, compatible=0",
"INSERT INTO assignments SET subId=5, revId=4, pref=4, compatible=0",
"INSERT INTO assignments SET subId=5, revId=5, pref=2, compatible=0",
"INSERT INTO assignments SET subId=5, revId=7, pref=1, compatible=0",
"INSERT INTO assignments SET subId=5, revId=8, pref=4, compatible=0",
"INSERT INTO assignments SET subId=5, revId=9, pref=2, compatible=0",
"INSERT INTO assignments SET subId=6, revId=3, pref=4, compatible=0",
"INSERT INTO assignments SET subId=6, revId=4, pref=1, compatible=0",
"INSERT INTO assignments SET subId=6, revId=5, pref=1, compatible=0",
"INSERT INTO assignments SET subId=6, revId=7, pref=5, compatible=0",
"INSERT INTO assignments SET subId=6, revId=8, pref=5, compatible=0",
"INSERT INTO assignments SET subId=6, revId=9, pref=2, compatible=0",
"INSERT INTO assignments SET subId=6, revId=10, pref=1, compatible=0",
"INSERT INTO assignments SET subId=6, revId=11, pref=2, compatible=0",
"INSERT INTO assignments SET subId=6, revId=12, pref=2, compatible=0",
"INSERT INTO assignments SET subId=6, revId=13, pref=2, compatible=0",
"INSERT INTO assignments SET subId=6, revId=14, pref=5, compatible=0",
"INSERT INTO assignments SET subId=6, revId=15, pref=5, compatible=0",
"INSERT INTO assignments SET subId=6, revId=16, pref=2, compatible=0",
"INSERT INTO assignments SET subId=6, revId=17, pref=5, compatible=0",
"INSERT INTO assignments SET subId=6, revId=18, pref=1, compatible=0",
"INSERT INTO assignments SET subId=6, revId=2, pref=2, compatible=0",
"INSERT INTO assignments SET subId=7, revId=10, pref=3, compatible=0",
"INSERT INTO assignments SET subId=7, revId=11, pref=3, compatible=0",
"INSERT INTO assignments SET subId=7, revId=13, pref=3, compatible=0",
"INSERT INTO assignments SET subId=7, revId=14, pref=4, compatible=0",
"INSERT INTO assignments SET subId=7, revId=16, pref=2, compatible=0",
"INSERT INTO assignments SET subId=7, revId=17, pref=0, compatible=0",
"INSERT INTO assignments SET subId=7, revId=18, pref=3, compatible=0",
"INSERT INTO assignments SET subId=7, revId=4, pref=2, compatible=0",
"INSERT INTO assignments SET subId=7, revId=5, pref=5, compatible=0",
"INSERT INTO assignments SET subId=7, revId=6, pref=5, compatible=0",
"INSERT INTO assignments SET subId=7, revId=9, pref=3, compatible=0",
"INSERT INTO assignments SET subId=8, revId=10, pref=3, compatible=0",
"INSERT INTO assignments SET subId=8, revId=14, pref=2, compatible=0",
"INSERT INTO assignments SET subId=8, revId=15, pref=2, compatible=0",
"INSERT INTO assignments SET subId=8, revId=16, pref=2, compatible=0",
"INSERT INTO assignments SET subId=8, revId=17, pref=1, compatible=0",
"INSERT INTO assignments SET subId=8, revId=2, pref=2, compatible=0",
"INSERT INTO assignments SET subId=8, revId=18, pref=2, compatible=0",
"INSERT INTO assignments SET subId=8, revId=3, pref=3, compatible=0",
"INSERT INTO assignments SET subId=8, revId=4, pref=0, compatible=0",
"INSERT INTO assignments SET subId=8, revId=6, pref=3, compatible=0",
"INSERT INTO assignments SET subId=8, revId=7, pref=3, compatible=0",
"INSERT INTO assignments SET subId=8, revId=8, pref=3, compatible=0",
"INSERT INTO assignments SET subId=8, revId=9, pref=3, compatible=0",
"INSERT INTO assignments SET subId=9, revId=11, pref=3, compatible=0",
"INSERT INTO assignments SET subId=9, revId=12, pref=5, compatible=0",
"INSERT INTO assignments SET subId=9, revId=13, pref=4, compatible=0",
"INSERT INTO assignments SET subId=9, revId=15, pref=1, compatible=0",
"INSERT INTO assignments SET subId=9, revId=16, pref=2, compatible=0",
"INSERT INTO assignments SET subId=9, revId=17, pref=3, compatible=0",
"INSERT INTO assignments SET subId=9, revId=3, pref=3, compatible=0",
"INSERT INTO assignments SET subId=9, revId=4, pref=4, compatible=0",
"INSERT INTO assignments SET subId=9, revId=5, pref=4, compatible=0",
"INSERT INTO assignments SET subId=9, revId=8, pref=2, compatible=0",
"INSERT INTO assignments SET subId=9, revId=9, pref=2, compatible=0",
"INSERT INTO assignments SET subId=10, revId=3, pref=5, compatible=0",
"INSERT INTO assignments SET subId=10, revId=4, pref=4, compatible=0",
"INSERT INTO assignments SET subId=10, revId=5, pref=3, compatible=0",
"INSERT INTO assignments SET subId=10, revId=6, pref=0, compatible=0",
"INSERT INTO assignments SET subId=10, revId=7, pref=4, compatible=0",
"INSERT INTO assignments SET subId=10, revId=8, pref=2, compatible=0",
"INSERT INTO assignments SET subId=10, revId=9, pref=2, compatible=0",
"INSERT INTO assignments SET subId=10, revId=10, pref=1, compatible=0",
"INSERT INTO assignments SET subId=10, revId=11, pref=5, compatible=0",
"INSERT INTO assignments SET subId=10, revId=13, pref=3, compatible=0",
"INSERT INTO assignments SET subId=10, revId=14, pref=1, compatible=0",
"INSERT INTO assignments SET subId=10, revId=15, pref=1, compatible=0",
"INSERT INTO assignments SET subId=10, revId=17, pref=4, compatible=0",
"INSERT INTO assignments SET subId=10, revId=18, pref=5, compatible=0",
"INSERT INTO assignments SET subId=11, revId=10, pref=2, compatible=0",
"INSERT INTO assignments SET subId=11, revId=11, pref=3, compatible=0",
"INSERT INTO assignments SET subId=11, revId=12, pref=4, compatible=0",
"INSERT INTO assignments SET subId=11, revId=13, pref=2, compatible=0",
"INSERT INTO assignments SET subId=11, revId=15, pref=2, compatible=0",
"INSERT INTO assignments SET subId=11, revId=16, pref=1, compatible=0",
"INSERT INTO assignments SET subId=11, revId=18, pref=3, compatible=0",
"INSERT INTO assignments SET subId=11, revId=3, pref=5, compatible=0",
"INSERT INTO assignments SET subId=11, revId=6, pref=1, compatible=0",
"INSERT INTO assignments SET subId=11, revId=8, pref=3, compatible=0",
"INSERT INTO assignments SET subId=11, revId=9, pref=2, compatible=0",
"INSERT INTO assignments SET subId=12, revId=11, pref=2, compatible=0",
"INSERT INTO assignments SET subId=12, revId=12, pref=1, compatible=0",
"INSERT INTO assignments SET subId=12, revId=13, pref=2, compatible=0",
"INSERT INTO assignments SET subId=12, revId=14, pref=0, compatible=0",
"INSERT INTO assignments SET subId=12, revId=15, pref=2, compatible=0",
"INSERT INTO assignments SET subId=12, revId=16, pref=1, compatible=0",
"INSERT INTO assignments SET subId=12, revId=17, pref=2, compatible=0",
"INSERT INTO assignments SET subId=12, revId=2, pref=1, compatible=0",
"INSERT INTO assignments SET subId=12, revId=18, pref=1, compatible=0",
"INSERT INTO assignments SET subId=12, revId=4, pref=3, compatible=0",
"INSERT INTO assignments SET subId=12, revId=5, pref=2, compatible=0",
"INSERT INTO assignments SET subId=12, revId=7, pref=2, compatible=0",
"INSERT INTO assignments SET subId=12, revId=8, pref=3, compatible=0",
"INSERT INTO assignments SET subId=12, revId=9, pref=2, compatible=0",
"INSERT INTO assignments SET subId=13, revId=11, pref=2, compatible=0",
"INSERT INTO assignments SET subId=13, revId=15, pref=4, compatible=0",
"INSERT INTO assignments SET subId=13, revId=16, pref=1, compatible=0",
"INSERT INTO assignments SET subId=13, revId=17, pref=3, compatible=0",
"INSERT INTO assignments SET subId=13, revId=2, pref=3, compatible=0",
"INSERT INTO assignments SET subId=13, revId=18, pref=3, compatible=0",
"INSERT INTO assignments SET subId=13, revId=6, pref=1, compatible=0",
"INSERT INTO assignments SET subId=13, revId=7, pref=2, compatible=0",
"INSERT INTO assignments SET subId=14, revId=10, pref=2, compatible=0",
"INSERT INTO assignments SET subId=14, revId=11, pref=2, compatible=0",
"INSERT INTO assignments SET subId=14, revId=12, pref=2, compatible=0",
"INSERT INTO assignments SET subId=14, revId=14, pref=2, compatible=0",
"INSERT INTO assignments SET subId=14, revId=15, pref=1, compatible=0",
"INSERT INTO assignments SET subId=14, revId=16, pref=1, compatible=0",
"INSERT INTO assignments SET subId=14, revId=17, pref=1, compatible=0",
"INSERT INTO assignments SET subId=14, revId=2, pref=4, compatible=0",
"INSERT INTO assignments SET subId=14, revId=18, pref=2, compatible=0",
"INSERT INTO assignments SET subId=14, revId=3, pref=4, compatible=0",
"INSERT INTO assignments SET subId=14, revId=4, pref=3, compatible=0",
"INSERT INTO assignments SET subId=14, revId=5, pref=4, compatible=0",
"INSERT INTO assignments SET subId=15, revId=11, pref=4, compatible=0",
"INSERT INTO assignments SET subId=15, revId=12, pref=2, compatible=0",
"INSERT INTO assignments SET subId=15, revId=13, pref=2, compatible=0",
"INSERT INTO assignments SET subId=15, revId=14, pref=2, compatible=0",
"INSERT INTO assignments SET subId=15, revId=15, pref=1, compatible=0",
"INSERT INTO assignments SET subId=15, revId=16, pref=1, compatible=0",
"INSERT INTO assignments SET subId=15, revId=18, pref=2, compatible=0",
"INSERT INTO assignments SET subId=15, revId=3, pref=4, compatible=0",
"INSERT INTO assignments SET subId=15, revId=4, pref=2, compatible=0",
"INSERT INTO assignments SET subId=15, revId=5, pref=3, compatible=0",
"INSERT INTO assignments SET subId=15, revId=6, pref=4, compatible=0",
"INSERT INTO assignments SET subId=15, revId=8, pref=2, compatible=0",
"INSERT INTO assignments SET subId=16, revId=10, pref=2, compatible=0",
"INSERT INTO assignments SET subId=16, revId=12, pref=2, compatible=0",
"INSERT INTO assignments SET subId=16, revId=13, pref=1, compatible=0",
"INSERT INTO assignments SET subId=16, revId=14, pref=2, compatible=0",
"INSERT INTO assignments SET subId=16, revId=15, pref=4, compatible=0",
"INSERT INTO assignments SET subId=16, revId=16, pref=1, compatible=0",
"INSERT INTO assignments SET subId=16, revId=17, pref=1, compatible=0",
"INSERT INTO assignments SET subId=16, revId=18, pref=2, compatible=0",
"INSERT INTO assignments SET subId=16, revId=3, pref=3, compatible=0",
"INSERT INTO assignments SET subId=16, revId=4, pref=2, compatible=0",
"INSERT INTO assignments SET subId=16, revId=5, pref=2, compatible=0",
"INSERT INTO assignments SET subId=16, revId=6, pref=2, compatible=0",
"INSERT INTO assignments SET subId=16, revId=7, pref=3, compatible=0",
"INSERT INTO assignments SET subId=16, revId=8, pref=3, compatible=0",
"INSERT INTO assignments SET subId=16, revId=9, pref=3, compatible=0",
"INSERT INTO assignments SET subId=17, revId=10, pref=3, compatible=0",
"INSERT INTO assignments SET subId=17, revId=11, pref=3, compatible=0",
"INSERT INTO assignments SET subId=17, revId=13, pref=3, compatible=0",
"INSERT INTO assignments SET subId=17, revId=14, pref=2, compatible=0",
"INSERT INTO assignments SET subId=17, revId=15, pref=3, compatible=0",
"INSERT INTO assignments SET subId=17, revId=17, pref=3, compatible=0",
"INSERT INTO assignments SET subId=17, revId=3, pref=2, compatible=0",
"INSERT INTO assignments SET subId=17, revId=4, pref=3, compatible=0",
"INSERT INTO assignments SET subId=17, revId=5, pref=2, compatible=0",
"INSERT INTO assignments SET subId=17, revId=6, pref=5, compatible=0",
"INSERT INTO assignments SET subId=17, revId=7, pref=4, compatible=0",
"INSERT INTO assignments SET subId=17, revId=8, pref=4, compatible=0",
"INSERT INTO assignments SET subId=17, revId=9, pref=2, compatible=0",
"INSERT INTO assignments SET subId=18, revId=10, pref=3, compatible=0",
"INSERT INTO assignments SET subId=18, revId=11, pref=1, compatible=0",
"INSERT INTO assignments SET subId=18, revId=12, pref=4, compatible=0",
"INSERT INTO assignments SET subId=18, revId=13, pref=2, compatible=0",
"INSERT INTO assignments SET subId=18, revId=14, pref=1, compatible=0",
"INSERT INTO assignments SET subId=18, revId=15, pref=0, compatible=0",
"INSERT INTO assignments SET subId=18, revId=16, pref=4, compatible=0",
"INSERT INTO assignments SET subId=18, revId=17, pref=2, compatible=0",
"INSERT INTO assignments SET subId=18, revId=3, pref=3, compatible=0",
"INSERT INTO assignments SET subId=18, revId=4, pref=4, compatible=0",
"INSERT INTO assignments SET subId=18, revId=5, pref=3, compatible=0",
"INSERT INTO assignments SET subId=18, revId=8, pref=2, compatible=0",
"INSERT INTO assignments SET subId=18, revId=9, pref=2, compatible=0",
"INSERT INTO assignments SET subId=19, revId=10, pref=2, compatible=0",
"INSERT INTO assignments SET subId=19, revId=11, pref=1, compatible=0",
"INSERT INTO assignments SET subId=19, revId=12, pref=3, compatible=0",
"INSERT INTO assignments SET subId=19, revId=14, pref=1, compatible=0",
"INSERT INTO assignments SET subId=19, revId=15, pref=4, compatible=0",
"INSERT INTO assignments SET subId=19, revId=16, pref=2, compatible=0",
"INSERT INTO assignments SET subId=19, revId=18, pref=4, compatible=0",
"INSERT INTO assignments SET subId=19, revId=3, pref=1, compatible=0",
"INSERT INTO assignments SET subId=19, revId=5, pref=4, compatible=0",
"INSERT INTO assignments SET subId=19, revId=7, pref=4, compatible=0",
"INSERT INTO assignments SET subId=19, revId=9, pref=1, compatible=0",
"INSERT INTO assignments SET subId=20, revId=10, pref=3, compatible=0",
"INSERT INTO assignments SET subId=20, revId=11, pref=2, compatible=0",
"INSERT INTO assignments SET subId=20, revId=13, pref=2, compatible=0",
"INSERT INTO assignments SET subId=20, revId=14, pref=4, compatible=0",
"INSERT INTO assignments SET subId=20, revId=16, pref=4, compatible=0",
"INSERT INTO assignments SET subId=20, revId=17, pref=2, compatible=0",
"INSERT INTO assignments SET subId=20, revId=2, pref=3, compatible=0",
"INSERT INTO assignments SET subId=20, revId=3, pref=1, compatible=0",
"INSERT INTO assignments SET subId=20, revId=6, pref=4, compatible=0",
"INSERT INTO assignments SET subId=20, revId=8, pref=3, compatible=0",
"INSERT INTO assignments SET subId=20, revId=9, pref=1, compatible=0",
"INSERT INTO assignments SET subId=21, revId=10, pref=4, compatible=0",
"INSERT INTO assignments SET subId=21, revId=12, pref=4, compatible=0",
"INSERT INTO assignments SET subId=21, revId=13, pref=2, compatible=0",
"INSERT INTO assignments SET subId=21, revId=14, pref=5, compatible=0",
"INSERT INTO assignments SET subId=21, revId=15, pref=4, compatible=0",
"INSERT INTO assignments SET subId=21, revId=17, pref=2, compatible=0",
"INSERT INTO assignments SET subId=21, revId=2, pref=3, compatible=0",
"INSERT INTO assignments SET subId=21, revId=18, pref=4, compatible=0",
"INSERT INTO assignments SET subId=21, revId=3, pref=2, compatible=0",
"INSERT INTO assignments SET subId=21, revId=4, pref=2, compatible=0",
"INSERT INTO assignments SET subId=21, revId=6, pref=3, compatible=0",
"INSERT INTO assignments SET subId=21, revId=8, pref=4, compatible=0",
"INSERT INTO assignments SET subId=22, revId=10, pref=3, compatible=0",
"INSERT INTO assignments SET subId=22, revId=11, pref=4, compatible=0",
"INSERT INTO assignments SET subId=22, revId=14, pref=1, compatible=0",
"INSERT INTO assignments SET subId=22, revId=15, pref=3, compatible=0",
"INSERT INTO assignments SET subId=22, revId=16, pref=4, compatible=0",
"INSERT INTO assignments SET subId=22, revId=17, pref=4, compatible=0",
"INSERT INTO assignments SET subId=22, revId=18, pref=3, compatible=0",
"INSERT INTO assignments SET subId=22, revId=5, pref=4, compatible=0",
"INSERT INTO assignments SET subId=22, revId=7, pref=1, compatible=0",
"INSERT INTO assignments SET subId=22, revId=9, pref=1, compatible=0",
"INSERT INTO assignments SET subId=23, revId=11, pref=3, compatible=0",
"INSERT INTO assignments SET subId=23, revId=12, pref=2, compatible=0",
"INSERT INTO assignments SET subId=23, revId=13, pref=2, compatible=0",
"INSERT INTO assignments SET subId=23, revId=14, pref=5, compatible=0",
"INSERT INTO assignments SET subId=23, revId=2, pref=4, compatible=0",
"INSERT INTO assignments SET subId=23, revId=3, pref=2, compatible=0",
"INSERT INTO assignments SET subId=23, revId=6, pref=3, compatible=0",
"INSERT INTO assignments SET subId=23, revId=7, pref=3, compatible=0",
"INSERT INTO assignments SET subId=23, revId=8, pref=5, compatible=0",
"INSERT INTO assignments SET subId=24, revId=10, pref=3, compatible=0",
"INSERT INTO assignments SET subId=24, revId=11, pref=4, compatible=0",
"INSERT INTO assignments SET subId=24, revId=13, pref=5, compatible=0",
"INSERT INTO assignments SET subId=24, revId=17, pref=5, compatible=0",
"INSERT INTO assignments SET subId=24, revId=2, pref=2, compatible=0",
"INSERT INTO assignments SET subId=24, revId=3, pref=4, compatible=0",
"INSERT INTO assignments SET subId=24, revId=4, pref=1, compatible=0",
"INSERT INTO assignments SET subId=24, revId=5, pref=1, compatible=0",
"INSERT INTO assignments SET subId=24, revId=6, pref=4, compatible=0",
"INSERT INTO assignments SET subId=24, revId=7, pref=2, compatible=0",
"INSERT INTO assignments SET subId=24, revId=9, pref=2, compatible=0",
"INSERT INTO assignments SET subId=25, revId=10, pref=1, compatible=0",
"INSERT INTO assignments SET subId=25, revId=11, pref=3, compatible=0",
"INSERT INTO assignments SET subId=25, revId=12, pref=1, compatible=0",
"INSERT INTO assignments SET subId=25, revId=13, pref=3, compatible=0",
"INSERT INTO assignments SET subId=25, revId=14, pref=2, compatible=0",
"INSERT INTO assignments SET subId=25, revId=15, pref=2, compatible=0",
"INSERT INTO assignments SET subId=25, revId=16, pref=1, compatible=0",
"INSERT INTO assignments SET subId=25, revId=17, pref=3, compatible=0",
"INSERT INTO assignments SET subId=25, revId=18, pref=5, compatible=0",
"INSERT INTO assignments SET subId=25, revId=3, pref=3, compatible=0",
"INSERT INTO assignments SET subId=25, revId=5, pref=2, compatible=0",
"INSERT INTO assignments SET subId=25, revId=7, pref=3, compatible=0",
"INSERT INTO assignments SET subId=25, revId=9, pref=2, compatible=0",
"INSERT INTO assignments SET subId=26, revId=10, pref=1, compatible=0",
"INSERT INTO assignments SET subId=26, revId=11, pref=2, compatible=0",
"INSERT INTO assignments SET subId=26, revId=12, pref=0, compatible=0",
"INSERT INTO assignments SET subId=26, revId=13, pref=3, compatible=0",
"INSERT INTO assignments SET subId=26, revId=14, pref=2, compatible=0",
"INSERT INTO assignments SET subId=26, revId=16, pref=1, compatible=0",
"INSERT INTO assignments SET subId=26, revId=17, pref=2, compatible=0",
"INSERT INTO assignments SET subId=26, revId=3, pref=3, compatible=0",
"INSERT INTO assignments SET subId=26, revId=4, pref=5, compatible=0",
"INSERT INTO assignments SET subId=26, revId=5, pref=2, compatible=0",
"INSERT INTO assignments SET subId=26, revId=6, pref=4, compatible=0",
"INSERT INTO assignments SET subId=26, revId=7, pref=4, compatible=0",
"INSERT INTO assignments SET subId=26, revId=8, pref=1, compatible=0",
"INSERT INTO assignments SET subId=26, revId=9, pref=3, compatible=0",
"INSERT INTO assignments SET subId=27, revId=10, pref=5, compatible=0",
"INSERT INTO assignments SET subId=27, revId=11, pref=2, compatible=0",
"INSERT INTO assignments SET subId=27, revId=12, pref=2, compatible=0",
"INSERT INTO assignments SET subId=27, revId=13, pref=1, compatible=0",
"INSERT INTO assignments SET subId=27, revId=14, pref=4, compatible=0",
"INSERT INTO assignments SET subId=27, revId=15, pref=0, compatible=0",
"INSERT INTO assignments SET subId=27, revId=16, pref=2, compatible=0",
"INSERT INTO assignments SET subId=27, revId=17, pref=1, compatible=0",
"INSERT INTO assignments SET subId=27, revId=2, pref=1, compatible=0",
"INSERT INTO assignments SET subId=27, revId=18, pref=2, compatible=0",
"INSERT INTO assignments SET subId=27, revId=3, pref=2, compatible=0",
"INSERT INTO assignments SET subId=27, revId=5, pref=5, compatible=0",
"INSERT INTO assignments SET subId=27, revId=7, pref=1, compatible=0",
"INSERT INTO assignments SET subId=27, revId=8, pref=1, compatible=0",
"INSERT INTO assignments SET subId=27, revId=9, pref=4, compatible=0",
"INSERT INTO assignments SET subId=28, revId=10, pref=3, compatible=0",
"INSERT INTO assignments SET subId=28, revId=13, pref=3, compatible=0",
"INSERT INTO assignments SET subId=28, revId=15, pref=3, compatible=0",
"INSERT INTO assignments SET subId=28, revId=16, pref=2, compatible=0",
"INSERT INTO assignments SET subId=28, revId=3, pref=2, compatible=0",
"INSERT INTO assignments SET subId=28, revId=4, pref=4, compatible=0",
"INSERT INTO assignments SET subId=28, revId=5, pref=3, compatible=0",
"INSERT INTO assignments SET subId=28, revId=6, pref=2, compatible=0",
"INSERT INTO assignments SET subId=28, revId=9, pref=3, compatible=0",
"INSERT INTO assignments SET subId=29, revId=11, pref=3, compatible=0",
"INSERT INTO assignments SET subId=29, revId=12, pref=3, compatible=0",
"INSERT INTO assignments SET subId=29, revId=13, pref=3, compatible=0",
"INSERT INTO assignments SET subId=29, revId=15, pref=1, compatible=0",
"INSERT INTO assignments SET subId=29, revId=16, pref=2, compatible=0",
"INSERT INTO assignments SET subId=29, revId=17, pref=2, compatible=0",
"INSERT INTO assignments SET subId=29, revId=2, pref=1, compatible=0",
"INSERT INTO assignments SET subId=29, revId=4, pref=3, compatible=0",
"INSERT INTO assignments SET subId=29, revId=6, pref=2, compatible=0",
"INSERT INTO assignments SET subId=29, revId=8, pref=2, compatible=0",
"INSERT INTO assignments SET subId=29, revId=9, pref=3, compatible=0",
"INSERT INTO assignments SET subId=30, revId=14, pref=3, compatible=0",
"INSERT INTO assignments SET subId=30, revId=15, pref=1, compatible=0",
"INSERT INTO assignments SET subId=30, revId=16, pref=2, compatible=0",
"INSERT INTO assignments SET subId=30, revId=17, pref=2, compatible=0",
"INSERT INTO assignments SET subId=30, revId=2, pref=4, compatible=0",
"INSERT INTO assignments SET subId=30, revId=18, pref=3, compatible=0",
"INSERT INTO assignments SET subId=30, revId=3, pref=4, compatible=0",
"INSERT INTO assignments SET subId=30, revId=8, pref=2, compatible=0",
"INSERT INTO assignments SET subId=31, revId=13, pref=2, compatible=0",
"INSERT INTO assignments SET subId=31, revId=14, pref=3, compatible=0",
"INSERT INTO assignments SET subId=31, revId=17, pref=3, compatible=0",
"INSERT INTO assignments SET subId=31, revId=2, pref=1, compatible=0",
"INSERT INTO assignments SET subId=31, revId=18, pref=2, compatible=0",
"INSERT INTO assignments SET subId=31, revId=3, pref=2, compatible=0",
"INSERT INTO assignments SET subId=31, revId=4, pref=5, compatible=0",
"INSERT INTO assignments SET subId=31, revId=7, pref=3, compatible=0",
"INSERT INTO assignments SET subId=31, revId=9, pref=3, compatible=0",
"INSERT INTO assignments SET subId=32, revId=10, pref=3, compatible=0",
"INSERT INTO assignments SET subId=32, revId=12, pref=4, compatible=0",
"INSERT INTO assignments SET subId=32, revId=13, pref=2, compatible=0",
"INSERT INTO assignments SET subId=32, revId=14, pref=3, compatible=0",
"INSERT INTO assignments SET subId=32, revId=15, pref=2, compatible=0",
"INSERT INTO assignments SET subId=32, revId=16, pref=2, compatible=0",
"INSERT INTO assignments SET subId=32, revId=17, pref=3, compatible=0",
"INSERT INTO assignments SET subId=32, revId=2, pref=3, compatible=0",
"INSERT INTO assignments SET subId=32, revId=18, pref=1, compatible=0",
"INSERT INTO assignments SET subId=32, revId=3, pref=3, compatible=0",
"INSERT INTO assignments SET subId=32, revId=4, pref=3, compatible=0",
"INSERT INTO assignments SET subId=32, revId=5, pref=2, compatible=0",
"INSERT INTO assignments SET subId=32, revId=6, pref=1, compatible=0",
"INSERT INTO assignments SET subId=32, revId=8, pref=1, compatible=0",
"INSERT INTO assignments SET subId=33, revId=10, pref=3, compatible=0",
"INSERT INTO assignments SET subId=33, revId=13, pref=2, compatible=0",
"INSERT INTO assignments SET subId=33, revId=14, pref=3, compatible=0",
"INSERT INTO assignments SET subId=33, revId=15, pref=3, compatible=0",
"INSERT INTO assignments SET subId=33, revId=16, pref=1, compatible=0",
"INSERT INTO assignments SET subId=33, revId=17, pref=2, compatible=0",
"INSERT INTO assignments SET subId=33, revId=2, pref=3, compatible=0",
"INSERT INTO assignments SET subId=33, revId=18, pref=2, compatible=0",
"INSERT INTO assignments SET subId=33, revId=3, pref=5, compatible=0",
"INSERT INTO assignments SET subId=33, revId=4, pref=0, compatible=0",
"INSERT INTO assignments SET subId=33, revId=6, pref=1, compatible=0",
"INSERT INTO assignments SET subId=33, revId=7, pref=3, compatible=0",
"INSERT INTO assignments SET subId=33, revId=9, pref=3, compatible=0",
"INSERT INTO assignments SET subId=34, revId=10, pref=3, compatible=0",
"INSERT INTO assignments SET subId=34, revId=11, pref=2, compatible=0",
"INSERT INTO assignments SET subId=34, revId=12, pref=4, compatible=0",
"INSERT INTO assignments SET subId=34, revId=13, pref=2, compatible=0",
"INSERT INTO assignments SET subId=34, revId=2, pref=4, compatible=0",
"INSERT INTO assignments SET subId=34, revId=5, pref=4, compatible=0",
"INSERT INTO assignments SET subId=34, revId=8, pref=3, compatible=0",
"INSERT INTO assignments SET subId=34, revId=9, pref=3, compatible=0",
"INSERT INTO assignments SET subId=35, revId=10, pref=3, compatible=0",
"INSERT INTO assignments SET subId=35, revId=11, pref=2, compatible=0",
"INSERT INTO assignments SET subId=35, revId=13, pref=2, compatible=0",
"INSERT INTO assignments SET subId=35, revId=14, pref=4, compatible=0",
"INSERT INTO assignments SET subId=35, revId=16, pref=1, compatible=0",
"INSERT INTO assignments SET subId=35, revId=18, pref=3, compatible=0",
"INSERT INTO assignments SET subId=35, revId=3, pref=4, compatible=0",
"INSERT INTO assignments SET subId=35, revId=5, pref=3, compatible=0",
"INSERT INTO assignments SET subId=35, revId=8, pref=4, compatible=0",
"INSERT INTO assignments SET subId=35, revId=9, pref=3, compatible=0",
"INSERT INTO assignments SET subId=36, revId=10, pref=2, compatible=0",
"INSERT INTO assignments SET subId=36, revId=11, pref=2, compatible=0",
"INSERT INTO assignments SET subId=36, revId=13, pref=2, compatible=0",
"INSERT INTO assignments SET subId=36, revId=14, pref=4, compatible=0",
"INSERT INTO assignments SET subId=36, revId=15, pref=4, compatible=0",
"INSERT INTO assignments SET subId=36, revId=2, pref=1, compatible=0",
"INSERT INTO assignments SET subId=36, revId=3, pref=3, compatible=0",
"INSERT INTO assignments SET subId=36, revId=4, pref=3, compatible=0",
"INSERT INTO assignments SET subId=36, revId=5, pref=4, compatible=0",
"INSERT INTO assignments SET subId=36, revId=6, pref=0, compatible=0",
"INSERT INTO assignments SET subId=36, revId=7, pref=4, compatible=0",
"INSERT INTO assignments SET subId=36, revId=8, pref=5, compatible=0",
"INSERT INTO assignments SET subId=37, revId=10, pref=5, compatible=0",
"INSERT INTO assignments SET subId=37, revId=11, pref=4, compatible=0",
"INSERT INTO assignments SET subId=37, revId=16, pref=3, compatible=0",
"INSERT INTO assignments SET subId=37, revId=17, pref=3, compatible=0",
"INSERT INTO assignments SET subId=37, revId=2, pref=5, compatible=0",
"INSERT INTO assignments SET subId=37, revId=18, pref=4, compatible=0",
"INSERT INTO assignments SET subId=37, revId=4, pref=4, compatible=0",
"INSERT INTO assignments SET subId=37, revId=5, pref=3, compatible=0",
"INSERT INTO assignments SET subId=37, revId=6, pref=4, compatible=0",
"INSERT INTO assignments SET subId=37, revId=7, pref=4, compatible=0",
"INSERT INTO assignments SET subId=37, revId=9, pref=4, compatible=0",
"INSERT INTO assignments SET subId=38, revId=10, pref=2, compatible=0",
"INSERT INTO assignments SET subId=38, revId=12, pref=4, compatible=0",
"INSERT INTO assignments SET subId=38, revId=14, pref=3, compatible=0",
"INSERT INTO assignments SET subId=38, revId=15, pref=1, compatible=0",
"INSERT INTO assignments SET subId=38, revId=16, pref=3, compatible=0",
"INSERT INTO assignments SET subId=38, revId=17, pref=2, compatible=0",
"INSERT INTO assignments SET subId=38, revId=3, pref=2, compatible=0",
"INSERT INTO assignments SET subId=38, revId=5, pref=3, compatible=0",
"INSERT INTO assignments SET subId=38, revId=7, pref=4, compatible=0",
"INSERT INTO assignments SET subId=38, revId=8, pref=3, compatible=0",
"INSERT INTO assignments SET subId=38, revId=9, pref=3, compatible=0",
"INSERT INTO assignments SET subId=39, revId=10, pref=3, compatible=0",
"INSERT INTO assignments SET subId=39, revId=11, pref=2, compatible=0",
"INSERT INTO assignments SET subId=39, revId=13, pref=4, compatible=0",
"INSERT INTO assignments SET subId=39, revId=14, pref=2, compatible=0",
"INSERT INTO assignments SET subId=39, revId=15, pref=1, compatible=0",
"INSERT INTO assignments SET subId=39, revId=16, pref=2, compatible=0",
"INSERT INTO assignments SET subId=39, revId=17, pref=3, compatible=0",
"INSERT INTO assignments SET subId=39, revId=18, pref=2, compatible=0",
"INSERT INTO assignments SET subId=39, revId=3, pref=3, compatible=0",
"INSERT INTO assignments SET subId=39, revId=4, pref=5, compatible=0",
"INSERT INTO assignments SET subId=39, revId=5, pref=2, compatible=0",
"INSERT INTO assignments SET subId=39, revId=6, pref=3, compatible=0",
"INSERT INTO assignments SET subId=39, revId=7, pref=4, compatible=0",
"INSERT INTO assignments SET subId=40, revId=10, pref=3, compatible=0",
"INSERT INTO assignments SET subId=40, revId=12, pref=3, compatible=0",
"INSERT INTO assignments SET subId=40, revId=13, pref=4, compatible=0",
"INSERT INTO assignments SET subId=40, revId=14, pref=3, compatible=0",
"INSERT INTO assignments SET subId=40, revId=17, pref=3, compatible=0",
"INSERT INTO assignments SET subId=40, revId=2, pref=4, compatible=0",
"INSERT INTO assignments SET subId=40, revId=18, pref=3, compatible=0",
"INSERT INTO assignments SET subId=40, revId=3, pref=3, compatible=0",
"INSERT INTO assignments SET subId=40, revId=5, pref=2, compatible=0",
"INSERT INTO assignments SET subId=40, revId=8, pref=3, compatible=0",
"INSERT INTO assignments SET subId=41, revId=10, pref=3, compatible=0",
"INSERT INTO assignments SET subId=41, revId=11, pref=4, compatible=0",
"INSERT INTO assignments SET subId=41, revId=12, pref=2, compatible=0",
"INSERT INTO assignments SET subId=41, revId=13, pref=0, compatible=0",
"INSERT INTO assignments SET subId=41, revId=15, pref=3, compatible=0",
"INSERT INTO assignments SET subId=41, revId=16, pref=3, compatible=0",
"INSERT INTO assignments SET subId=41, revId=17, pref=3, compatible=0",
"INSERT INTO assignments SET subId=41, revId=2, pref=4, compatible=0",
"INSERT INTO assignments SET subId=41, revId=18, pref=1, compatible=0",
"INSERT INTO assignments SET subId=41, revId=3, pref=4, compatible=0",
"INSERT INTO assignments SET subId=41, revId=6, pref=2, compatible=0",
"INSERT INTO assignments SET subId=42, revId=13, pref=5, compatible=0",
"INSERT INTO assignments SET subId=42, revId=14, pref=1, compatible=0",
"INSERT INTO assignments SET subId=42, revId=15, pref=4, compatible=0",
"INSERT INTO assignments SET subId=42, revId=16, pref=2, compatible=0",
"INSERT INTO assignments SET subId=42, revId=17, pref=4, compatible=0",
"INSERT INTO assignments SET subId=42, revId=2, pref=1, compatible=0",
"INSERT INTO assignments SET subId=42, revId=18, pref=3, compatible=0",
"INSERT INTO assignments SET subId=42, revId=4, pref=4, compatible=0",
"INSERT INTO assignments SET subId=42, revId=5, pref=1, compatible=0",
"INSERT INTO assignments SET subId=42, revId=6, pref=3, compatible=0",
"INSERT INTO assignments SET subId=42, revId=7, pref=3, compatible=0",
"INSERT INTO assignments SET subId=42, revId=9, pref=3, compatible=0",
"INSERT INTO assignments SET subId=43, revId=11, pref=2, compatible=0",
"INSERT INTO assignments SET subId=43, revId=12, pref=2, compatible=0",
"INSERT INTO assignments SET subId=43, revId=13, pref=3, compatible=0",
"INSERT INTO assignments SET subId=43, revId=15, pref=1, compatible=0",
"INSERT INTO assignments SET subId=43, revId=16, pref=4, compatible=0",
"INSERT INTO assignments SET subId=43, revId=17, pref=3, compatible=0",
"INSERT INTO assignments SET subId=43, revId=18, pref=3, compatible=0",
"INSERT INTO assignments SET subId=43, revId=3, pref=2, compatible=0",
"INSERT INTO assignments SET subId=43, revId=4, pref=1, compatible=0",
"INSERT INTO assignments SET subId=43, revId=5, pref=3, compatible=0",
"INSERT INTO assignments SET subId=43, revId=6, pref=3, compatible=0",
"INSERT INTO assignments SET subId=43, revId=7, pref=2, compatible=0",
"INSERT INTO assignments SET subId=43, revId=8, pref=4, compatible=0",
"INSERT INTO assignments SET subId=43, revId=9, pref=2, compatible=0",
"INSERT INTO assignments SET subId=44, revId=10, pref=2, compatible=0",
"INSERT INTO assignments SET subId=44, revId=11, pref=2, compatible=0",
"INSERT INTO assignments SET subId=44, revId=14, pref=4, compatible=0",
"INSERT INTO assignments SET subId=44, revId=16, pref=3, compatible=0",
"INSERT INTO assignments SET subId=44, revId=18, pref=4, compatible=0",
"INSERT INTO assignments SET subId=44, revId=4, pref=3, compatible=0",
"INSERT INTO assignments SET subId=44, revId=7, pref=2, compatible=0",
"INSERT INTO assignments SET subId=44, revId=8, pref=3, compatible=0",
"INSERT INTO assignments SET subId=44, revId=9, pref=2, compatible=0",
"INSERT INTO assignments SET subId=45, revId=10, pref=2, compatible=0",
"INSERT INTO assignments SET subId=45, revId=11, pref=3, compatible=0",
"INSERT INTO assignments SET subId=45, revId=12, pref=4, compatible=0",
"INSERT INTO assignments SET subId=45, revId=14, pref=5, compatible=0",
"INSERT INTO assignments SET subId=45, revId=15, pref=3, compatible=0",
"INSERT INTO assignments SET subId=45, revId=3, pref=4, compatible=0",
"INSERT INTO assignments SET subId=45, revId=5, pref=2, compatible=0",
"INSERT INTO assignments SET subId=45, revId=6, pref=4, compatible=0",
"INSERT INTO assignments SET subId=45, revId=7, pref=5, compatible=0",
"INSERT INTO assignments SET subId=45, revId=9, pref=2, compatible=0",
"INSERT INTO assignments SET subId=46, revId=10, pref=2, compatible=0",
"INSERT INTO assignments SET subId=46, revId=11, pref=4, compatible=0",
"INSERT INTO assignments SET subId=46, revId=12, pref=3, compatible=0",
"INSERT INTO assignments SET subId=46, revId=13, pref=5, compatible=0",
"INSERT INTO assignments SET subId=46, revId=14, pref=3, compatible=0",
"INSERT INTO assignments SET subId=46, revId=15, pref=1, compatible=0",
"INSERT INTO assignments SET subId=46, revId=16, pref=2, compatible=0",
"INSERT INTO assignments SET subId=46, revId=17, pref=5, compatible=0",
"INSERT INTO assignments SET subId=46, revId=2, pref=4, compatible=0",
"INSERT INTO assignments SET subId=46, revId=5, pref=2, compatible=0",
"INSERT INTO assignments SET subId=46, revId=9, pref=2, compatible=0",
"INSERT INTO assignments SET subId=47, revId=10, pref=2, compatible=0",
"INSERT INTO assignments SET subId=47, revId=11, pref=3, compatible=0",
"INSERT INTO assignments SET subId=47, revId=12, pref=5, compatible=0",
"INSERT INTO assignments SET subId=47, revId=13, pref=1, compatible=0",
"INSERT INTO assignments SET subId=47, revId=16, pref=1, compatible=0",
"INSERT INTO assignments SET subId=47, revId=17, pref=3, compatible=0",
"INSERT INTO assignments SET subId=47, revId=2, pref=3, compatible=0",
"INSERT INTO assignments SET subId=47, revId=3, pref=2, compatible=0",
"INSERT INTO assignments SET subId=47, revId=6, pref=4, compatible=0",
"INSERT INTO assignments SET subId=47, revId=7, pref=3, compatible=0",
"INSERT INTO assignments SET subId=47, revId=8, pref=3, compatible=0",
"INSERT INTO assignments SET subId=47, revId=9, pref=2, compatible=0",
"INSERT INTO assignments SET subId=48, revId=10, pref=3, compatible=0",
"INSERT INTO assignments SET subId=48, revId=11, pref=4, compatible=0",
"INSERT INTO assignments SET subId=48, revId=14, pref=2, compatible=0",
"INSERT INTO assignments SET subId=48, revId=15, pref=5, compatible=0",
"INSERT INTO assignments SET subId=48, revId=17, pref=1, compatible=0",
"INSERT INTO assignments SET subId=48, revId=2, pref=3, compatible=0",
"INSERT INTO assignments SET subId=48, revId=18, pref=1, compatible=0",
"INSERT INTO assignments SET subId=48, revId=3, pref=4, compatible=0",
"INSERT INTO assignments SET subId=48, revId=4, pref=4, compatible=0",
"INSERT INTO assignments SET subId=48, revId=5, pref=3, compatible=0",
"INSERT INTO assignments SET subId=48, revId=6, pref=4, compatible=0",
"INSERT INTO assignments SET subId=48, revId=7, pref=1, compatible=0",
"INSERT INTO assignments SET subId=48, revId=8, pref=2, compatible=0",
"INSERT INTO assignments SET subId=48, revId=9, pref=2, compatible=0",
"INSERT INTO assignments SET subId=49, revId=10, pref=4, compatible=0",
"INSERT INTO assignments SET subId=49, revId=11, pref=5, compatible=0",
"INSERT INTO assignments SET subId=49, revId=12, pref=2, compatible=0",
"INSERT INTO assignments SET subId=49, revId=13, pref=2, compatible=0",
"INSERT INTO assignments SET subId=49, revId=14, pref=2, compatible=0",
"INSERT INTO assignments SET subId=49, revId=16, pref=1, compatible=0",
"INSERT INTO assignments SET subId=49, revId=17, pref=1, compatible=0",
"INSERT INTO assignments SET subId=49, revId=2, pref=5, compatible=0",
"INSERT INTO assignments SET subId=49, revId=18, pref=3, compatible=0",
"INSERT INTO assignments SET subId=49, revId=3, pref=2, compatible=0",
"INSERT INTO assignments SET subId=49, revId=5, pref=5, compatible=0",
"INSERT INTO assignments SET subId=49, revId=8, pref=2, compatible=0",
"INSERT INTO assignments SET subId=49, revId=9, pref=2, compatible=0",
"INSERT INTO assignments SET subId=50, revId=10, pref=3, compatible=0",
"INSERT INTO assignments SET subId=50, revId=11, pref=2, compatible=0",
"INSERT INTO assignments SET subId=50, revId=12, pref=1, compatible=0",
"INSERT INTO assignments SET subId=50, revId=13, pref=4, compatible=0",
"INSERT INTO assignments SET subId=50, revId=14, pref=1, compatible=0",
"INSERT INTO assignments SET subId=50, revId=15, pref=1, compatible=0",
"INSERT INTO assignments SET subId=50, revId=16, pref=0, compatible=0",
"INSERT INTO assignments SET subId=50, revId=17, pref=5, compatible=0",
"INSERT INTO assignments SET subId=50, revId=18, pref=2, compatible=0",
"INSERT INTO assignments SET subId=50, revId=3, pref=2, compatible=0",
"INSERT INTO assignments SET subId=50, revId=4, pref=5, compatible=0",
"INSERT INTO assignments SET subId=50, revId=5, pref=4, compatible=0",
"INSERT INTO assignments SET subId=50, revId=6, pref=4, compatible=0",
"INSERT INTO assignments SET subId=50, revId=7, pref=1, compatible=0",
"INSERT INTO assignments SET subId=50, revId=8, pref=1, compatible=0",
"INSERT INTO assignments SET subId=50, revId=9, pref=1, compatible=0",
"INSERT INTO assignments SET subId=51, revId=11, pref=1, compatible=0",
"INSERT INTO assignments SET subId=51, revId=12, pref=4, compatible=1",
"INSERT INTO assignments SET subId=51, revId=15, pref=2, compatible=0",
"INSERT INTO assignments SET subId=51, revId=17, pref=2, compatible=0",
"INSERT INTO assignments SET subId=51, revId=3, pref=4, compatible=0",
"INSERT INTO assignments SET subId=51, revId=4, pref=2, compatible=0",
"INSERT INTO assignments SET subId=51, revId=5, pref=4, compatible=0",
"INSERT INTO assignments SET subId=51, revId=7, pref=4, compatible=0",
"INSERT INTO assignments SET subId=51, revId=8, pref=2, compatible=0",
"INSERT INTO assignments SET subId=52, revId=10, pref=4, compatible=0",
"INSERT INTO assignments SET subId=52, revId=12, pref=2, compatible=0",
"INSERT INTO assignments SET subId=52, revId=14, pref=2, compatible=0",
"INSERT INTO assignments SET subId=52, revId=15, pref=4, compatible=0",
"INSERT INTO assignments SET subId=52, revId=17, pref=3, compatible=0",
"INSERT INTO assignments SET subId=52, revId=2, pref=4, compatible=0",
"INSERT INTO assignments SET subId=52, revId=18, pref=1, compatible=0",
"INSERT INTO assignments SET subId=52, revId=3, pref=4, compatible=0",
"INSERT INTO assignments SET subId=52, revId=4, pref=5, compatible=0",
"INSERT INTO assignments SET subId=52, revId=5, pref=2, compatible=0",
"INSERT INTO assignments SET subId=52, revId=6, pref=2, compatible=0",
"INSERT INTO assignments SET subId=52, revId=8, pref=3, compatible=0",
"INSERT INTO assignments SET subId=52, revId=9, pref=3, compatible=0",
"INSERT INTO assignments SET subId=53, revId=10, pref=2, compatible=0",
"INSERT INTO assignments SET subId=53, revId=11, pref=3, compatible=0",
"INSERT INTO assignments SET subId=53, revId=13, pref=2, compatible=0",
"INSERT INTO assignments SET subId=53, revId=15, pref=2, compatible=0",
"INSERT INTO assignments SET subId=53, revId=16, pref=4, compatible=0",
"INSERT INTO assignments SET subId=53, revId=17, pref=5, compatible=0",
"INSERT INTO assignments SET subId=53, revId=2, pref=1, compatible=0",
"INSERT INTO assignments SET subId=53, revId=18, pref=4, compatible=0",
"INSERT INTO assignments SET subId=53, revId=4, pref=2, compatible=0",
"INSERT INTO assignments SET subId=53, revId=5, pref=2, compatible=0",
"INSERT INTO assignments SET subId=53, revId=6, pref=5, compatible=0",
"INSERT INTO assignments SET subId=53, revId=7, pref=2, compatible=0",
"INSERT INTO assignments SET subId=53, revId=8, pref=2, compatible=0",
"INSERT INTO assignments SET subId=53, revId=9, pref=4, compatible=0",
"INSERT INTO assignments SET subId=54, revId=2, pref=4, compatible=0",
"INSERT INTO assignments SET subId=54, revId=3, pref=4, compatible=1",
"INSERT INTO assignments SET subId=54, revId=4, pref=1, compatible=0",
"INSERT INTO assignments SET subId=54, revId=5, pref=2, compatible=-1",
"INSERT INTO assignments SET subId=54, revId=6, pref=2, compatible=0",
"INSERT INTO assignments SET subId=54, revId=7, pref=2, compatible=0",
"INSERT INTO assignments SET subId=54, revId=8, pref=1, compatible=0",
"INSERT INTO assignments SET subId=54, revId=9, pref=5, compatible=0",
"INSERT INTO assignments SET subId=54, revId=10, pref=0, compatible=0",
"INSERT INTO assignments SET subId=54, revId=11, pref=3, compatible=1",
"INSERT INTO assignments SET subId=54, revId=13, pref=4, compatible=0",
"INSERT INTO assignments SET subId=54, revId=14, pref=4, compatible=0",
"INSERT INTO assignments SET subId=54, revId=18, pref=4, compatible=0");

$cnnct = db_connect();
for ($i = 0; $i < count($queries); $i++) db_query($queries[$i], $cnnct);

// if the submission directory is not BASE/subs/ then copy all
// the files from BASE/subs/ to the submission directory

$qry = "SELECT subId, format FROM submissions";
$res = db_query($qry, $cnnct);
while ($row = mysql_fetch_row($res)) {
  $subId = $row[0];
  $fmt = $row[1];
  if (!file_exists(SUBMIT_DIR."/$subId.$fmt"))
    copy("../subs/$subId.$fmt", SUBMIT_DIR."/$subId.$fmt");
}
header("Location: receiptCustomize.php?testOnly=yes{$urlParams}");
?>
