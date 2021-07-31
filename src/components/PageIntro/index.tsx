import * as S from './styles'

type PageIntroProps = {
  children: React.ReactNode
}

const PageIntro = ({ children }: PageIntroProps) => (
  <S.PageIntro>
    <S.IntroTitle>{children}</S.IntroTitle>
  </S.PageIntro>
)

export default PageIntro
