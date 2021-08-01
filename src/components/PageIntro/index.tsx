import * as S from './styles'

type PageIntroProps = {
  children: React.ReactNode
}

const PageIntro = ({ children }: PageIntroProps) => (
  <S.PageIntro>
    <S.IntroTitle>{children}</S.IntroTitle>
    <S.IntroText>
      <S.IntroStrong>{children}</S.IntroStrong>
      {children}
    </S.IntroText>
  </S.PageIntro>
)

export default PageIntro
